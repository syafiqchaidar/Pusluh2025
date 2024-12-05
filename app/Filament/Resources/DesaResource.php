<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DesaResource\Pages;
use App\Filament\Resources\DesaResource\RelationManagers;
use App\Models\Desa;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DesaResource extends Resource
{
    protected static ?string $model = Desa::class;
    protected static ?string $navigationGroup = 'Master Wilayah';
    protected static ?int $navigationSort = 4;
    protected static ?string $navigationLabel = 'Desa';
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
                Forms\Components\TextInput::make('kecamatan_id')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('kode')
                    ->required()
                    ->maxLength(255),
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
                Tables\Columns\TextColumn::make('provinsi.nama')
                    ->label("Nama Provinsi")
                    ->searchable(),
                Tables\Columns\TextColumn::make('kabupaten.nama')
                    ->label("Nama Kabupaten")
                    ->searchable(),
                Tables\Columns\TextColumn::make('kecamatan.nama')
                    ->label("Nama Kecamatan")
                    ->searchable(),
                Tables\Columns\TextColumn::make('kode')
                    ->label("Kode Desa")
                    ->searchable(),
                Tables\Columns\TextColumn::make('nama')
                    ->label("Nama Desa")
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
            'index' => Pages\ListDesas::route('/'),
            'create' => Pages\CreateDesa::route('/create'),
            'edit' => Pages\EditDesa::route('/{record}/edit'),
        ];
    }
}
