<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FechaFixtureResource\Pages;
use App\Filament\Resources\FechaFixtureResource\RelationManagers;
use App\Models\FechaFixture;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class FechaFixtureResource extends Resource
{
    protected static ?string $model = FechaFixture::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Fieldset::make('Registro Fixture')
                    ->schema([
                        Forms\Components\TextInput::make('fecha')
                            ->label('Fecha')
                            ->required(),
                    ])
                    ->columns(1),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                tables\Columns\TextColumn::make('fecha')
                ->label('Fecha Fixture'),
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
            'index' => Pages\ListFechaFixtures::route('/'),
            'create' => Pages\CreateFechaFixture::route('/create'),
            'edit' => Pages\EditFechaFixture::route('/{record}/edit'),
        ];
    }
}
