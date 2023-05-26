<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Flight extends Model
{
    use HasFactory;

    protected $table = 'flights';
    protected $guarded = [];

    public function fromCity()
    {
        return $this->hasOne(City::class, 'id', 'from_city_id');
    }

    public function toCity()
    {
        return $this->hasOne(City::class, 'id', 'to_city_id');
    }

    public function flightType()
    {
        return $this->hasOne(FlightType::class, 'id', 'flight_type_id');
    }
}
