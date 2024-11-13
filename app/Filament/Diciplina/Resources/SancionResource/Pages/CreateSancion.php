<?php

namespace App\Filament\Diciplina\Resources\SancionResource\Pages;

use App\Filament\Diciplina\Resources\SancionResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateSancion extends CreateRecord
{
    protected static string $resource = SancionResource::class;
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::geturl('index');
    }
}
