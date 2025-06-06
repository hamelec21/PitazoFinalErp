<?php

namespace App\Filament\Resources\TipoCampeonatoResource\Pages;

use App\Filament\Resources\TipoCampeonatoResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTipoCampeonato extends EditRecord
{
    protected static string $resource = TipoCampeonatoResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::geturl('index');
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
