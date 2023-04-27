<?php

namespace App\Filament\Resources\AirlineCompanyResource\Pages;

use App\Filament\Resources\AirlineCompanyResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAirlineCompany extends EditRecord
{
    protected static string $resource = AirlineCompanyResource::class;

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
