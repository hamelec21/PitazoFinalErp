<?php

namespace App\Filament\Resources\FechaFixtureResource\Pages;

use App\Filament\Resources\FechaFixtureResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateFechaFixture extends CreateRecord
{
    protected static string $resource = FechaFixtureResource::class;
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::geturl('index');
    }
}
