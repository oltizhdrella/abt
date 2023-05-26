<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AirlinePlane extends Model
{
    use HasFactory;

    protected $table = 'airline_planes';

    protected $guarded = [];

    public function company()
    {
        return $this->hasOne(AirlineCompany::class, 'id', 'airline_id');
    }
}
