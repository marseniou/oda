<?php

namespace App\Filament\Resources\ConcertResource\Pages;

use App\Filament\Resources\ConcertResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditConcert extends EditRecord
{
    protected static string $resource = ConcertResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
