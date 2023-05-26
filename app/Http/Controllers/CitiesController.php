<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;
use Rap2hpoutre\FastExcel\FastExcel;

class CitiesController extends Controller
{
    public function importCities()
    {
        $collection = (new FastExcel)->configureCsv(',', '"', 'UTF-8')->import('worldcities.csv', function ($line) {
            return City::updateOrCreate([
                'country'   => $line['country'],
                'city'      => $line['city'],
                'city_country'  => $line['city'].', '.$line['country']
            ]);});
    }
}
