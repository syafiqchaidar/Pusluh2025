<?php

namespace App\Filament\Resources;

use App\Filament\Resources\JabatanFungsionalResource\Pages;
use App\Filament\Resources\JabatanFungsionalResource\RelationManagers;
use App\Models\JabatanFungsional;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class JabatanFungsionalResource extends Resource
{
    protected static ?string $model = JabatanFungsional::class;
    protected static ?string $navigationGroup = 'Master Data';
    protected static ?int $navigationSort = 1;
    protected static ?string $navigationLabel = 'Jenjang Jabatan Penyuluh';
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Textarea::make('kategori_jf_id')
                    ->required()
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('jenjang_jabat')
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('batas_usia')
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
            'index' => Pages\ListJabatanFungsionals::route('/'),
            'create' => Pages\CreateJabatanFungsional::route('/create'),
            'edit' => Pages\EditJabatanFungsional::route('/{record}/edit'),
        ];
    }
}
