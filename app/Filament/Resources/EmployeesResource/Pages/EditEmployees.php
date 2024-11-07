<?php

namespace App\Filament\Resources\EmployeesResource\Pages;

use App\Filament\Resources\EmployeesResource;
use App\Models\Employee_files;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Database\Eloquent\Model;

class EditEmployees extends EditRecord
{
    protected static string $resource = EmployeesResource::class;

    protected function handleRecordUpdate(Model $record, array $data): Model
    {
        // Update record employee
        $record->update($data);

        // Handle file uploads
        if (isset($data['files']) && is_array($data['files'])) {
            foreach ($data['files'] as $file) {
                // Cek apakah file sudah ada di database
                $existingFile = Employee_files::where('file_path', $file)
                    ->where('employee_id', $record->id)
                    ->first();

                // Jika belum ada, buat record baru
                if (!$existingFile) {
                    Employee_files::create([
                        'employee_id' => $record->id,
                        'file_type' => 'other', // atau sesuaikan dengan kebutuhan
                        'file_path' => $file,
                        'original_name' => $file,
                        'mime_type' => mime_content_type(storage_path('app/public/employee_files' . $file)),
                        'file_size' => filesize(storage_path('app/public/employee_files' . $file))
                    ]);
                }
            }
        }

        return $record;
    }

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function afterSave(): void
    {
        redirect($this->getResource()::getUrl('index'));
    }
}