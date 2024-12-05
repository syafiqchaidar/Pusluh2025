<?php

namespace App\Filament\Resources\KategoriJabatanFungsionalResource\Pages;

use App\Filament\Resources\KategoriJabatanFungsionalResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditKategoriJabatanFungsional extends EditRecord
{
    protected static string $resource = KategoriJabatanFungsionalResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
