<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ComunicadoResource\Pages;
use App\Filament\Resources\ComunicadoResource\RelationManagers;
use App\Models\Comunicado;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\RichEditor;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Support\Str;

class ComunicadoResource extends Resource
{
    protected static ?string $model = Comunicado::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form->schema([
            RichEditor::make('comunicado')
                ->label('')
                ->disableToolbarButtons(['codeBlock', 'link', 'redo', 'strike', 'underline', 'undo', 'attachFiles'])
                ->columnSpan('full')
                ->required(fn(string $context) => $context === 'create'),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('comunicado')
                    ->formatStateUsing(fn(string $state): string => Str::limit(strip_tags($state), 100, '...')) // Limitar a 50 caracteres y eliminar etiquetas HTML
                    ->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([Tables\Actions\EditAction::make()])
            ->bulkActions([Tables\Actions\BulkActionGroup::make([Tables\Actions\DeleteBulkAction::make()])]);
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
            'index' => Pages\ListComunicados::route('/'),
            'create' => Pages\CreateComunicado::route('/create'),
            'edit' => Pages\EditComunicado::route('/{record}/edit'),
        ];
    }
}
