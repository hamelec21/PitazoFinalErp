<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SancionResource\Pages;
use App\Filament\Resources\SancionResource\RelationManagers;
use App\Models\Club;
use App\Models\FechaFixture;
use App\Models\Sancion;
use App\Models\Serie;
use App\Models\TipoCampeonato;
use App\Models\TipoSerie;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\Select;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SancionResource extends Resource
{
    protected static ?string $model = Sancion::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Select::make('fecha_fixture_id')
                    ->label('Fecha')
                    ->options(FechaFixture::all()->pluck('fecha', 'id'))
                    ->searchable()
                    ->required(),

                Select::make('club_id')
                    ->label('Club')
                    ->options(Club::all()->pluck('nombre', 'id'))
                    ->searchable()
                    ->required(),


                Select::make('tipo_serie_id')
                    ->label('Categoria')
                    ->options(TipoSerie::all()->pluck('nombre', 'id'))
                    ->searchable()
                    ->required(),

                Select::make('serie_id')
                    ->label('Serie')
                    ->options(Serie::all()->pluck('nombre', 'id'))
                    ->searchable()
                    ->required(),
                Select::make('tipo_campeonato_id')
                    ->label('Tipo Campeonato')
                    ->options(TipoCampeonato::all()->pluck('nombre', 'id'))
                    ->searchable()
                    ->required(),

                Forms\Components\TextInput::make('nombre')
                    ->label('titulo')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('sancion')
                    ->label('Observacion')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('puntos')

                
                    ->label('Puntos Sanción')
                    ->helperText('Ingresa un número positivo para sumar puntos (ej: 3), o negativo para restar (ej: -3)')
                    ->required()
                    ->numeric()
                    ->default(0),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('fecha_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('club_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('tipo_serie_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('serie_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('tipo_campeonato_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('nombre')
                    ->searchable(),
                Tables\Columns\TextColumn::make('puntos')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
            'index' => Pages\ListSancions::route('/'),
            'create' => Pages\CreateSancion::route('/create'),
            'edit' => Pages\EditSancion::route('/{record}/edit'),
        ];
    }
}
