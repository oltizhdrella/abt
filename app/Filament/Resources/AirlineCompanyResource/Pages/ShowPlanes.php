<?php

namespace App\Filament\Resources\AirlineCompanyResource\Pages;

use App\Filament\Resources\AirlineCompanyResource;
use App\Filament\Resources\AirlineCompanyResource\Widgets\StatsOverviewWidget as WidgetsStatsOverviewWidget;
use Filament\Resources\Pages\Page;

class ShowPlanes extends Page
{
    protected static string $resource = AirlineCompanyResource::class;

    protected static string $view = 'filament.resources.airline-company-resource.pages.show-planes';

    protected static ?string $title = 'Planes';

    protected function getHeaderWidgets(): array
    {
        return [
            WidgetsStatsOverviewWidget::class
        ];
    }


 
}
