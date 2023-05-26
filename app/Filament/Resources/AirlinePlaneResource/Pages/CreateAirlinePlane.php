<?php

namespace App\Filament\Resources\AirlinePlaneResource\Pages;

use App\Filament\Resources\AirlinePlaneResource;
use App\Models\AirlineCompany;
use App\Models\AirplaneSeat;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateAirlinePlane extends CreateRecord
{
    protected static string $resource = AirlinePlaneResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function afterCreate(): void
    {

        // $economySeatsCount = $this->record->economy_seats;

        // while($economySeatsCount > 0)
        // {
        //     $economySeatName = $economySeatsCount.'E';
        //     AirplaneSeat::create(['airplane_id' => $this->record->id, 'seat_class' => 'economy', 'seat_name' => $economySeatName]);
        //     $economySeatsCount--;
        // }

        // $businnesSeatsCount = $this->record->business_seats;

        // while($businnesSeatsCount > 0)
        // {
        //     $businnesSeatName = $businnesSeatsCount.'B';
        //     AirplaneSeat::create(['airplane_id' => $this->record->id, 'seat_class' => 'business', 'seat_name' => $businnesSeatName]);
        //     $businnesSeatsCount--;
        // }

        // $firstClassSeatsCount = $this->record->first_class_seats;

        // while($firstClassSeatsCount > 0)
        // {
        //     $firstClassSeatName = $firstClassSeatsCount.'F';
        //     AirplaneSeat::create(['airplane_id' => $this->record->id, 'seat_class' => 'first class', 'seat_name' => $firstClassSeatName]);
        //     $firstClassSeatsCount--;
        // }

    }
}
