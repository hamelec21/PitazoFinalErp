<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PartidoResource\Pages;
use App\Filament\Resources\PartidoResource\RelationManagers;
use App\Models\Partido;
use App\Models\Club;
use App\Models\Serie;
use App\Models\TipoSerie;
use App\Models\FechaFixture;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\DatePicker;

class PartidoResource extends Resource
{
    protected static ?string $model = Partido::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('fecha_fixture_id')
                ->label('Fecha')
                ->options(FechaFixture::all()->pluck('fecha', 'id'))
                ->searchable()
                ->required()
                ->columnSpan('full'),

                Select::make('club_local_id')
                    ->label('Club Local')
                    ->options(Club::all()->pluck('nombre', 'id'))
                    ->searchable()
                    ->required(),
                Select::make('club_visitante_id')
                    ->label('Club Visitante')
                    ->options(Club::all()->pluck('nombre', 'id'))
                    ->searchable()
                    ->required(),

                Select::make('serie_id')
                    ->label('Serie')
                    ->options(Serie::all()->pluck('nombre', 'id'))
                    ->searchable()
                    ->required(),

                    Select::make('tipo_serie_id')
                    ->label('Tipo Serie')
                    ->options(TipoSerie::all()->pluck('nombre', 'id'))
                    ->searchable()
                    ->required(),

                    Forms\Components\TextInput::make('goles_local')
                ->label('Goles Local')
                ->required(),

                Forms\Components\TextInput::make('goles_visitante')
                ->label('Goles Visita')
                ->required(),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([

                TextColumn::make('fecha_fixture_id')
                ->label('Fecha'),
                TextColumn::make('clubLocal.nombre')
                    ->label('Club Local')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('clubVisitante.nombre')
                    ->label('Club Visitante')
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
                TextColumn::make('goles_local')
                    ->label('Goles Local'),
                TextColumn::make('goles_visitante')
                    ->label('Goles Visitante'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListPartidos::route('/'),
            'create' => Pages\CreatePartido::route('/create'),
            'edit' => Pages\EditPartido::route('/{record}/edit'),
        ];
    }
}
