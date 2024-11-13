<?php

namespace App\Filament\Diciplina\Resources\NotaResource\Pages;

use App\Filament\Diciplina\Resources\NotaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditNota extends EditRecord
{
    protected static string $resource = NotaResource::class;

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
