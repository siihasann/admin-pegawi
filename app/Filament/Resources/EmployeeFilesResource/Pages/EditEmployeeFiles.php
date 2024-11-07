<?php

namespace App\Filament\Resources\EmployeeFilesResource\Pages;

use App\Filament\Resources\EmployeeFilesResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditEmployeeFiles extends EditRecord
{
    protected static string $resource = EmployeeFilesResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
