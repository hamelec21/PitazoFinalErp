<?php

namespace App\Filament\Resources\TipoSancionResource\Pages;

use App\Filament\Resources\TipoSancionResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateTipoSancion extends CreateRecord
{
    protected static string $resource = TipoSancionResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::geturl('index');
    }
}
