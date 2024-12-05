<?php

namespace App\Filament\Resources;

use App\Filament\Resources\KategoriJabatanFungsionalResource\Pages;
use App\Filament\Resources\KategoriJabatanFungsionalResource\RelationManagers;
use App\Models\KategoriJabatanFungsional;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class KategoriJabatanFungsionalResource extends Resource
{
    protected static ?string $model = KategoriJabatanFungsional::class;
    protected static ?string $navigationGroup = 'Master Data';
    protected static ?int $navigationSort = 2;
    protected static ?string $navigationLabel = 'Kategori Jabatan Penyuluh';
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Textarea::make('nama')
                    ->required()
                    ->maxLength(65535)
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
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
            'index' => Pages\ListKategoriJabatanFungsionals::route('/'),
            'create' => Pages\CreateKategoriJabatanFungsional::route('/create'),
            'edit' => Pages\EditKategoriJabatanFungsional::route('/{record}/edit'),
        ];
    }
}
