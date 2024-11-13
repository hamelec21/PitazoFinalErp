<?php

namespace App\Filament\Diciplina\Resources;

use App\Filament\Diciplina\Resources\SancionResource\Pages;
use App\Filament\Diciplina\Resources\SancionResource\RelationManagers;
use App\Models\Club;
use App\Models\FechaFixture;
use App\Models\Sancion;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\RichEditor;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Barryvdh\DomPDF\Facade as PDF;

class SancionResource extends Resource
{
    protected static ?string $model = Sancion::class;

    protected static ?string $navigationIcon = 'heroicon-o-square-2-stack';
    protected static ?string $navigationLabel='Crear Sanción';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Fieldset::make('Registro Sanción')
                    ->schema([
                        Select::make('fecha_id')
                            ->label('Fecha Fixture')
                            ->options(FechaFixture::all()
                            ->pluck('fecha', 'id'))
                            ->searchable()
                            ->required(),

                        Select::make('club_id')
                            ->label('Nombre Club')
                            ->options(Club::all()
                                ->pluck('nombre', 'id'))
                            ->searchable()
                            ->required(),


                       TextInput::make('nombre')
                            ->label('Nombre Jugador')
                            ->required()
                        ->columnSpan(2),
                    ])
                    ->columns(2),
                Forms\Components\Fieldset::make('Describa la Sanción')
                    ->schema([
                        RichEditor::make('sancion')
                            ->label('')
                            ->disableToolbarButtons(
                                ['codeBlock',
                                    'link',
                                    'redo',
                                    'strike',
                                    'underline',
                                    'undo',
                                    'attachFiles'
                                ])
                            ->columnSpan('full')

                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('fechafixture.fecha')
                    ->label('Fecha'),
                Tables\Columns\ImageColumn::make('club.logo')
                    ->label('Logo')
                    ->circular(),
                Tables\Columns\TextColumn::make('club.nombre')
                    ->label('Club'),
                Tables\Columns\TextColumn::make('nombre')
                ->label('Nombre Jugador'),
                Tables\Columns\TextColumn::make('sancion')
                ->label('Sancion')
                ->html(),
            ])
            ->filters([
            Tables\Filters\SelectFilter::make('fechafixture')
            ->relationship('fechafixture', 'fecha')
                ->label('Fecha'),
                Tables\Filters\SelectFilter::make('club')
                    ->relationship('club', 'nombre')

            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\ViewAction::make()
                    ->label('Ver')
                    ->color('success'),

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
