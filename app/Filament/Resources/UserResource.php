<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('email')
                    ->email()
                    ->required()
                    ->maxLength(255),
                Forms\Components\DateTimePicker::make('email_verified_at'),
                Forms\Components\TextInput::make('password')
                    ->password()
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('provinsi_id')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('kabupaten_id')
                    ->numeric(),
                Forms\Components\TextInput::make('bpp_id')
                    ->numeric(),
                Forms\Components\Toggle::make('aktif'),
                Forms\Components\TextInput::make('no_hp')
                    ->maxLength(30),
                Forms\Components\Textarea::make('username')
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('nomor')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('nik')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('status_penyuluh')
                    ->maxLength(10),
                Forms\Components\TextInput::make('status_pendidikan')
                    ->maxLength(30),
                Forms\Components\TextInput::make('jenis_kelamin')
                    ->maxLength(10),
                Forms\Components\Textarea::make('tempat_lahir')
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\DatePicker::make('tanggal_lahir'),
                Forms\Components\TextInput::make('wilbin'),
                Forms\Components\TextInput::make('tahun')
                    ->maxLength(30),
                Forms\Components\TextInput::make('jenis_user')
                    ->maxLength(30),
                Forms\Components\TextInput::make('jf_penyuluh_id')
                    ->numeric(),
                Forms\Components\TextInput::make('kategori_jf_id')
                    ->numeric(),
                Forms\Components\TextInput::make('pangkat_golongans_id')
                    ->numeric(),
                Forms\Components\Textarea::make('nama_rekening')
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('nomor_rekening')
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('bank_rekening')
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('kelompok')
                    ->columnSpanFull(),
                Forms\Components\DatePicker::make('tanggal_nonaktif'),
                Forms\Components\Textarea::make('dokumen_nonaktif')
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('ket_nonaktif')
                    ->maxLength(65535)
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->searchable(),
                Tables\Columns\TextColumn::make('email_verified_at')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('provinsi_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('kabupaten_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('bpp_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\IconColumn::make('aktif')
                    ->boolean(),
                Tables\Columns\TextColumn::make('no_hp')
                    ->searchable(),
                Tables\Columns\TextColumn::make('nomor')
                    ->searchable(),
                Tables\Columns\TextColumn::make('nik')
                    ->searchable(),
                Tables\Columns\TextColumn::make('status_penyuluh')
                    ->searchable(),
                Tables\Columns\TextColumn::make('status_pendidikan')
                    ->searchable(),
                Tables\Columns\TextColumn::make('jenis_kelamin')
                    ->searchable(),
                Tables\Columns\TextColumn::make('tanggal_lahir')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('tahun')
                    ->searchable(),
                Tables\Columns\TextColumn::make('jenis_user')
                    ->searchable(),
                Tables\Columns\TextColumn::make('jf_penyuluh_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('kategori_jf_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('pangkat_golongans_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('tanggal_nonaktif')
                    ->date()
                    ->sortable(),
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
