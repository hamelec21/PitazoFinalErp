<?php

namespace App\Filament\Diciplina\Resources\SancionResource\Pages;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Filament\Diciplina\Resources\SancionResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Support\Facades\Auth;

class ListSancions extends ListRecords
{
    protected static string $resource = SancionResource::class;
    protected ?string $heading = 'Sanciones';

    protected function getHeaderActions(): array
    {
        return [

            Actions\CreateAction::make(),
        ];
    }
}
