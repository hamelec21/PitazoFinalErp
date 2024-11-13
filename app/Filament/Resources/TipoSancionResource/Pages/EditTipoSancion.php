<?php

namespace App\Filament\Resources\TipoSancionResource\Pages;

use App\Filament\Resources\TipoSancionResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTipoSancion extends EditRecord
{
    protected static string $resource = TipoSancionResource::class;

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
