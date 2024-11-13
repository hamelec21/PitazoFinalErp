<?php

namespace App\Filament\Resources\TipoSerieResource\Pages;

use App\Filament\Resources\TipoSerieResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTipoSeries extends ListRecords
{
    protected static string $resource = TipoSerieResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
