<?php

namespace App\Filament\Resources\JabatanFungsionalResource\Pages;

use App\Filament\Resources\JabatanFungsionalResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListJabatanFungsionals extends ListRecords
{
    protected static string $resource = JabatanFungsionalResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
