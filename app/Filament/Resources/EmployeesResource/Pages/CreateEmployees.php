<?php

namespace App\Filament\Resources\EmployeesResource\Pages;

use App\Filament\Resources\EmployeesResource;
use App\Models\Employee_files;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;

class CreateEmployees extends CreateRecord
{
    protected static string $resource = EmployeesResource::class;

    protected function handleRecordCreation(array $data): Model
    {
        // Buat record employee
        $employee = static::getModel()::create($data);

        // Handle file uploads
        if (isset($data['files']) && is_array($data['files'])) {
            foreach ($data['files'] as $file) {
                Employee_files::create([
                    'employee_id' => $employee->id,
                    'file_type' => 'other', // atau sesuaikan dengan kebutuhan
                    'file_path' => $file,
                    'original_name' => $file,
                    'mime_type' => mime_content_type(storage_path('app/public/' . $file)),
                    'file_size' => filesize(storage_path('app/public/' . $file))
                ]);
            }
        }

        return $employee;
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
