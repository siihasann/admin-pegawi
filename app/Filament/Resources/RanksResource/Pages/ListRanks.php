<?php

namespace App\Filament\Resources\RanksResource\Pages;

use App\Filament\Resources\RanksResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListRanks extends ListRecords
{
    protected static string $resource = RanksResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    protected function getTitle(): string
    {
        return 'Daftar Golongan';
    }
}
