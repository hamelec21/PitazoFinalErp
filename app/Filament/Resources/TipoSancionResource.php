<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TipoSancionResource\Pages;
use App\Filament\Resources\TipoSancionResource\RelationManagers;
use App\Models\TipoSancion;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TipoSancionResource extends Resource
{
    protected static ?string $model = TipoSancion::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Fieldset::make('Registro tipo de sancion')
                    ->schema([
                        Forms\Components\TextInput::make('nombre')
                            ->label('Tipo de sancion')
                            ->required(),
                    ])
                    ->columns(1),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                tables\Columns\TextColumn::make('id')
                    ->label('Id'),
                tables\Columns\TextColumn::make('nombre')
                    ->label('Tipo de sancion'),
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
            'index' => Pages\ListTipoSancions::route('/'),
            'create' => Pages\CreateTipoSancion::route('/create'),
            'edit' => Pages\EditTipoSancion::route('/{record}/edit'),
        ];
    }
}
