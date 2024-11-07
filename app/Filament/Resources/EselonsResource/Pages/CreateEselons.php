<?php

namespace App\Filament\Resources\EselonsResource\Pages;

use App\Filament\Resources\EselonsResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateEselons extends CreateRecord
{
    protected static string $resource = EselonsResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
