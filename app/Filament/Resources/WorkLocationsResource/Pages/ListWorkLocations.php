<?php

namespace App\Filament\Resources\WorkLocationsResource\Pages;

use App\Filament\Resources\WorkLocationsResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListWorkLocations extends ListRecords
{
    protected static string $resource = WorkLocationsResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
