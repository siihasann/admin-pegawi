<?php

namespace App\Filament\Resources\EmployeeFilesResource\Pages;

use App\Filament\Resources\EmployeeFilesResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateEmployeeFiles extends CreateRecord
{
    protected static string $resource = EmployeeFilesResource::class;
}
