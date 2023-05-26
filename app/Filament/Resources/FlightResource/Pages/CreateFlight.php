<?php

namespace App\Filament\Resources\FlightResource\Pages;

use App\Filament\Resources\FlightResource;
use App\Models\AirlinePlane;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;
use App\Models\AirplaneSeat;

class CreateFlight extends CreateRecord
{
    protected static string $resource = FlightResource::class;

    protected function afterCreate(): void
    {

            $plane = AirlinePlane::findorfail($this->record->airplane_id);
            AirplaneSeat::create(['flight_id' => $this->record->id, 'seat_class' => 'economy', 'seat_count' => $plane->economy_seats]);
            AirplaneSeat::create(['flight_id' => $this->record->id, 'seat_class' => 'business', 'seat_count' => $plane->business_seats]);
            AirplaneSeat::create(['flight_id' => $this->record->id, 'seat_class' => 'first class', 'seat_count' => $plane->first_class_seats]);
    }

}
