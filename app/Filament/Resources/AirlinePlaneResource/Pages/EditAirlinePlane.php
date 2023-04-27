<?php

namespace App\Filament\Resources\AirlinePlaneResource\Pages;

use App\Filament\Resources\AirlinePlaneResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAirlinePlane extends EditRecord
{
    protected static string $resource = AirlinePlaneResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
