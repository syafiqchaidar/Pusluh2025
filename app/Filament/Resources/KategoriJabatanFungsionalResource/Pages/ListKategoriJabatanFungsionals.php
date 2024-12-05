<?php

namespace App\Filament\Resources\KategoriJabatanFungsionalResource\Pages;

use App\Filament\Resources\KategoriJabatanFungsionalResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListKategoriJabatanFungsionals extends ListRecords
{
    protected static string $resource = KategoriJabatanFungsionalResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
