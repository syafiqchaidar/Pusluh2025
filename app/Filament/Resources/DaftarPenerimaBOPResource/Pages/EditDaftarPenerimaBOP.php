<?php

namespace App\Filament\Resources\DaftarPenerimaBOPResource\Pages;

use App\Filament\Resources\DaftarPenerimaBOPResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDaftarPenerimaBOP extends EditRecord
{
    protected static string $resource = DaftarPenerimaBOPResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
