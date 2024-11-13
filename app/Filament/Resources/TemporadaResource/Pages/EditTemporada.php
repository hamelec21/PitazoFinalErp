<?php

namespace App\Filament\Resources\TemporadaResource\Pages;

use App\Filament\Resources\TemporadaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTemporada extends EditRecord
{
    protected static string $resource = TemporadaResource::class;

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
