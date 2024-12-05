<?php

namespace App\Filament\Resources\BppResource\Pages;

use App\Filament\Resources\BppResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListBpps extends ListRecords
{
    protected static string $resource = BppResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
