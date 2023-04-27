<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AirlineCompany extends Model
{
    use HasFactory;

    protected $table = 'airline_companies';

    protected $guarded = ['id'];

    public function planes()
    {
        return $this->hasMany(AirlinePlane::class, 'airline_id', 'id');
    }

}
