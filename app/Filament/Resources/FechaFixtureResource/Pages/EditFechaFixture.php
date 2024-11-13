<?php

namespace App\Filament\Resources\FechaFixtureResource\Pages;

use App\Filament\Resources\FechaFixtureResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditFechaFixture extends EditRecord
{
    protected static string $resource = FechaFixtureResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::geturl('index');
    }
}
