<?php

namespace App\Filament\Resources\ResultadoResource\Pages;

use App\Filament\Resources\ResultadoResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditResultado extends EditRecord
{
    protected static string $resource = ResultadoResource::class;



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
