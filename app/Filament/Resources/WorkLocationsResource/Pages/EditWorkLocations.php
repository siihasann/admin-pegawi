<?php

namespace App\Filament\Resources\WorkLocationsResource\Pages;

use App\Filament\Resources\WorkLocationsResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditWorkLocations extends EditRecord
{
    protected static string $resource = WorkLocationsResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
