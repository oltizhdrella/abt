<?php

namespace App\Filament\Resources\AirlinePlaneResource\Pages;

use App\Filament\Resources\AirlinePlaneResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAirlinePlanes extends ListRecords
{
    protected static string $resource = AirlinePlaneResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
