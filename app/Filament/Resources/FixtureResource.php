<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FixtureResource\Pages;
use App\Filament\Resources\FixtureResource\RelationManagers;
use App\Models\Fixture;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class FixtureResource extends Resource
{
    protected static ?string $model = Fixture::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                 Forms\Components\Select::make('club_local_id')
                    ->relationship('clubLocal', 'nombre')
                    ->required(),
                Forms\Components\Select::make('club_visita_id')
                    ->relationship('clubVisita', 'nombre')
                    ->required(),
                Forms\Components\Select::make('tipo_campeonato_id')
                    ->relationship('tipoCampeonato', 'nombre')
                    ->required(),
                Forms\Components\Select::make('fecha_fixture_id')
                    ->relationship('fechaFixture', 'id')
                    ->required(),
                Forms\Components\Select::make('serie_id')
                    ->relationship('serie', 'nombre')
                    ->required()
                    ->columnSpan(2),


            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('tipoCampeonato.nombre')
                    ->numeric()
                    ->sortable(),

                Tables\Columns\TextColumn::make('serie.nombre')
                    ->numeric()
                    ->sortable(),

                Tables\Columns\TextColumn::make('clubLocal.nombre')
                    ->numeric()
                    ->sortable(),

                Tables\Columns\TextColumn::make('clubVisita.nombre')
                    ->numeric()
                    ->sortable(),

                Tables\Columns\TextColumn::make('fechaFixture.id')
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
            ->defaultSort('id', 'desc') // 👈 aquí se aplica el orden descendente
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
            'index' => Pages\ListFixtures::route('/'),
            'create' => Pages\CreateFixture::route('/create'),
            'edit' => Pages\EditFixture::route('/{record}/edit'),
        ];
    }
}
