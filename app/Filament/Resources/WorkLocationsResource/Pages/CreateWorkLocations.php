<?php

namespace App\Filament\Resources\WorkLocationsResource\Pages;

use App\Filament\Resources\WorkLocationsResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateWorkLocations extends CreateRecord
{
    protected static string $resource = WorkLocationsResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
