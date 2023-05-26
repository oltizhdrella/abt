<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FlightType extends Model
{
    use HasFactory;

    protected $table = 'flight_type';
    protected $guarded = [];
}
