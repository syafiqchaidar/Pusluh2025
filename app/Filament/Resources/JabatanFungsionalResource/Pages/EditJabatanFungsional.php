<?php

namespace App\Filament\Resources\JabatanFungsionalResource\Pages;

use App\Filament\Resources\JabatanFungsionalResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditJabatanFungsional extends EditRecord
{
    protected static string $resource = JabatanFungsionalResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
