<?php

namespace App\Filament\Resources\EselonsResource\Pages;

use App\Filament\Resources\EselonsResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditEselons extends EditRecord
{
    protected static string $resource = EselonsResource::class;

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
