<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BppResource\Pages;
use App\Filament\Resources\BppResource\RelationManagers;
use App\Models\Bpp;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class BppResource extends Resource
{
    protected static ?string $model = Bpp::class;
    protected static ?string $navigationGroup = 'Lembaga';
    protected static ?int $navigationSort = 1;
    protected static ?string $navigationLabel = 'Daftar BPP';
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('provinsi_id')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('kabupaten_id')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('kode')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('nama')
                    ->required()
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('latitude')
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('longitude')
                    ->maxLength(65535)
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama')
                    ->label("Nama BPP")
                    ->searchable(),
                Tables\Columns\TextColumn::make('provinsi.nama')
                    ->label("Nama Provinsi")
                    ->searchable(),
                Tables\Columns\TextColumn::make('kabupaten.nama')
                    ->label("Nama Provinsi")
                    ->searchable(),
                Tables\Columns\TextColumn::make('kode')
                    ->searchable(),
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
            'index' => Pages\ListBpps::route('/'),
            'create' => Pages\CreateBpp::route('/create'),
            'edit' => Pages\EditBpp::route('/{record}/edit'),
        ];
    }
}
