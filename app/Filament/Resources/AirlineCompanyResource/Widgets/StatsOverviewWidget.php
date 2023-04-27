<?php

namespace App\Filament\Resources\AirlineCompanyResource\Widgets;

use Filament\Widgets\Widget;

class StatsOverviewWidget extends Widget
{
    protected static string $view = 'filament.resources.airline-company-resource.widgets.stats-overview-widget';

    protected int | string | array $columnSpan = 'full';

}
