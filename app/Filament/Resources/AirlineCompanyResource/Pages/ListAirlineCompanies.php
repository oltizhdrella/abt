<?php

namespace App\Filament\Resources\AirlineCompanyResource\Pages;

use App\Filament\Resources\AirlineCompanyResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAirlineCompanies extends ListRecords
{
    protected static string $resource = AirlineCompanyResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
