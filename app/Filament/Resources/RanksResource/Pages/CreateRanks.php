<?php

namespace App\Filament\Resources\RanksResource\Pages;

use App\Filament\Resources\RanksResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateRanks extends CreateRecord
{
    protected static string $resource = RanksResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
