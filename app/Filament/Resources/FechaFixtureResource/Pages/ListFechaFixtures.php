<?php

namespace App\Filament\Resources\FechaFixtureResource\Pages;

use App\Filament\Resources\FechaFixtureResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListFechaFixtures extends ListRecords
{
    protected static string $resource = FechaFixtureResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
