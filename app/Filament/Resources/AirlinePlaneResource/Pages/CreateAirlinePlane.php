<?php

namespace App\Filament\Resources\AirlinePlaneResource\Pages;

use App\Filament\Resources\AirlinePlaneResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateAirlinePlane extends CreateRecord
{
    protected static string $resource = AirlinePlaneResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
