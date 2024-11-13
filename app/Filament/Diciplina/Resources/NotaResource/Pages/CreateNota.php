<?php

namespace App\Filament\Diciplina\Resources\NotaResource\Pages;

use App\Filament\Diciplina\Resources\NotaResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateNota extends CreateRecord
{
    protected static string $resource = NotaResource::class;
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::geturl('index');
    }
}
