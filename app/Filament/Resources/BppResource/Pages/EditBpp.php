<?php

namespace App\Filament\Resources\BppResource\Pages;

use App\Filament\Resources\BppResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditBpp extends EditRecord
{
    protected static string $resource = BppResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
