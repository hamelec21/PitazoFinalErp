<?php

namespace App\Filament\Resources\TemporadaResource\Pages;

use App\Filament\Resources\TemporadaResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateTemporada extends CreateRecord
{
    protected static string $resource = TemporadaResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::geturl('index');
    }
}
