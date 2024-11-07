<?php

namespace App\Filament\Resources\EselonsResource\Pages;

use App\Filament\Resources\EselonsResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListEselons extends ListRecords
{
    protected static string $resource = EselonsResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    protected function getTitle(): string
    {
        return 'Daftar Eselon';
    }
}
