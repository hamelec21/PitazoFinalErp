<?php

namespace App\Filament\Resources\TipoCampeonatoResource\Pages;

use App\Filament\Resources\TipoCampeonatoResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTipoCampeonatos extends ListRecords
{
    protected static string $resource = TipoCampeonatoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
