<?php

namespace App\Filament\Resources\DaftarPenerimaBOPResource\Pages;

use App\Filament\Resources\DaftarPenerimaBOPResource;
use App\Imports\DataPenyuluh;
use App\Imports\PenyuluhImport;
use Filament\Actions;
use Filament\Actions\Action;
use Filament\Resources\Pages\ListRecords;

class ListDaftarPenerimaBOPS extends ListRecords
{
    protected static string $resource = DaftarPenerimaBOPResource::class;

    protected ?string $heading = 'Daftar Penerima BOP';
    protected function getHeaderActions(): array
    {
        return [
            Action::make('download')->label("Unduh Template Excel")
            ->url('/template/new_Format_Data_Penyuluh_2025.xlsx', shouldOpenInNewTab: true)
            ->icon('heroicon-o-document-text')
            ->color("info"),
            \EightyNine\ExcelImport\ExcelImportAction::make()
            ->color("warning")
            ->use(DataPenyuluh::class),
            Actions\CreateAction::make(),
        ];
    }
}
