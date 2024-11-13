<?php

namespace App\Filament\Diciplina\Resources;

use App\Filament\Diciplina\Resources\NotaResource\Pages;
use App\Filament\Diciplina\Resources\NotaResource\RelationManagers;
use App\Models\Club;
use App\Models\FechaFixture;
use App\Models\Nota;
use App\Models\TipoSancion;
use Filament\Actions\Action;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Laravel\Prompts\Note;

class NotaResource extends Resource
{
    protected static ?string $model = Nota::class;

    protected static ?string $navigationIcon = 'heroicon-o-pencil-square';
    protected static ?string $navigationLabel='Crear Nota';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Forms\Components\Fieldset::make('Registre Nota')
                    ->schema([
                        Forms\Components\Select::make('fecha_id')
                            ->label('Fecha Fixture')
                            ->options(FechaFixture::all()
                                ->pluck('fecha', 'id'))
                            ->searchable()
                            ->required(),

                        Forms\Components\Select::make('club_id')
                            ->label('Nombre Club')
                            ->options(Club::all()
                                ->pluck('nombre', 'id'))
                            ->searchable()
                            ->required()
                            ->columns(2),

                        Forms\Components\Select::make('tipo_sancion_id')
                            ->label('Tipo Nota')
                            ->options(TipoSancion::all()
                                ->pluck('nombre', 'id'))
                            ->searchable()
                            ->required(),
                    ])
                    ->columns(2),
                Forms\Components\Fieldset::make('Describa la Nota')
                    ->schema([
                        Forms\Components\RichEditor::make('descripcion')
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
                Tables\Columns\TextColumn::make('tipoSancion.nombre')
                    ->label('Tipo Sancion'),
                Tables\Columns\TextColumn::make('descripcion')
                    ->label('Descripcion')
                    ->words(5)
                ->html(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Tipo Sancion')
                ->date(),

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
            'index' => Pages\ListNotas::route('/'),
            'create' => Pages\CreateNota::route('/create'),
            'edit' => Pages\EditNota::route('/{record}/edit'),
        ];
    }
}
