<?php

namespace App\Filament\Resources\RanksResource\Pages;

use App\Filament\Resources\RanksResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditRanks extends EditRecord
{
    protected static string $resource = RanksResource::class;

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
