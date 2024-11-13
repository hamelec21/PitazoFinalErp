<?php

namespace App\Filament\Resources\TipoSerieResource\Pages;

use App\Filament\Resources\TipoSerieResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateTipoSerie extends CreateRecord
{
    protected static string $resource = TipoSerieResource::class;
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::geturl('index');
    }
}
