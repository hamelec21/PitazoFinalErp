<?php

namespace App\Filament\Diciplina\Resources\SancionResource\Pages;

use App\Filament\Diciplina\Resources\SancionResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSancion extends EditRecord
{
    protected static string $resource = SancionResource::class;

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
