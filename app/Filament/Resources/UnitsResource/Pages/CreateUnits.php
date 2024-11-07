<?php

namespace App\Filament\Resources\UnitsResource\Pages;

use App\Filament\Resources\UnitsResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateUnits extends CreateRecord
{
    protected static string $resource = UnitsResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
