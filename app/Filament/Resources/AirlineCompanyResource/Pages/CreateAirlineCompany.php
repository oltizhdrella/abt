<?php

namespace App\Filament\Resources\AirlineCompanyResource\Pages;

use App\Filament\Resources\AirlineCompanyResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateAirlineCompany extends CreateRecord
{
    protected static string $resource = AirlineCompanyResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
