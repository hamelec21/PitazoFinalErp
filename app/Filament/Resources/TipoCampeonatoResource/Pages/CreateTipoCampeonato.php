<?php

namespace App\Filament\Resources\TipoCampeonatoResource\Pages;

use App\Filament\Resources\TipoCampeonatoResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateTipoCampeonato extends CreateRecord
{
    protected static string $resource = TipoCampeonatoResource::class;
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::geturl('index');
    }
}
