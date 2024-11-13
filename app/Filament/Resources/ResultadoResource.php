<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ResultadoResource\Pages;
use App\Filament\Resources\ResultadoResource\RelationManagers;
use App\Models\Resultado;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;

class ResultadoResource extends Resource
{
    protected static ?string $model = Resultado::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('club.nombre')
                    ->label('Club')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('serie.nombre')
                    ->label('Serie')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('tipoSerie.nombre')
                    ->label('Tipo de Serie')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('fecha_fixture')
                    ->label('Fecha')
                    ->sortable(),
                TextColumn::make('puntos')
                    ->label('Puntos')
                    ->sortable()  // Habilita la ordenación para esta columna
            ])
            ->filters([
                //
            ])
            ->actions([
               // Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);


    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListResultados::route('/'),
          //  'create' => Pages\CreateResultado::route('/create'),
            'edit' => Pages\EditResultado::route('/{record}/edit'),
        ];
    }


}
