<?php

namespace App\Filament\Resources\FlightResource\Pages;

use App\Filament\Resources\FlightResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditFlight extends EditRecord
{
    protected static string $resource = FlightResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
