<?php

namespace App\Filament\Resources\TipoSancionResource\Pages;

use App\Filament\Resources\TipoSancionResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTipoSancions extends ListRecords
{
    protected static string $resource = TipoSancionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
