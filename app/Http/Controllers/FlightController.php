<?php

namespace App\Http\Controllers;

use App\Models\AirplaneSeat;
use App\Models\City;
use App\Models\Flight;
use App\Models\FlightTicket;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class FlightController extends Controller
{
    public function findFlight(Request $request)
    {


        if (str_contains($request->from_place, '- ')) {
            $from = str_replace('- ', ', ', $request->from_place);
        } else {
            $from = str_replace('-', ', ', $request->from_place);
        }

        if (str_contains($request->to_place, '- ')) {
            $to = str_replace('- ', ', ', $request->to_place);
        } else {
            $to = str_replace('-', ', ', $request->to_place);
        }

        if ($request->class_selected == 'economy_class') {
            $class = 'economy';
        } elseif ($request->class_selected == 'business_class') {
            $class = 'business';
        } elseif ($request->class_selected == 'first_class') {
            $class = 'first class';
        }


        $departureDate = $request->depart_date;


        if (isset($request->return_date)) {
            $returnDate = $request->return_date;
        }


        $fromPlace = City::where('city_country', $from)->first();
        $toPlace = City::where('city_country', $to)->first();


        if (!isset($returnDate)) {
            $flight = Flight::where('from_city_id', $fromPlace->id)->where('to_city_id', $toPlace->id)
                ->whereDate('departure_date', '>=', Carbon::now('Europe/Stockholm'))->where('departure_date', $departureDate)->whereNull('return_date')->first();

            if (!$flight) {
                $recommandations = Flight::where('from_city_id', $fromPlace->id)->where('to_city_id', $toPlace->id)
                    ->whereDate('departure_date', '>=', Carbon::now('Europe/Stockholm'))->whereNull('return_date')->limit(10)->get();
                foreach ($recommandations as $recommandation) {
                    $recSeats = AirplaneSeat::where('flight_id', $recommandation->id)->where('seat_class', $class)->first();
                    if ($recSeats->seat_count > 0) {
                        $recommandation['from'] = $from;
                        $recommandation['to']   = $to;
                        $recommandation['class']   = $class;
                        $return['recommend'][] = $recommandation;
                    }
                }
                $return['actual_flight'] = null;
            } else {
                $flight['from'] = $from;
                $flight['to']   = $to;
                $flight['class'] = $class;
                $return['actual_flight'] = $flight;
            }
        } else {

            $flight = Flight::where('from_city_id', $fromPlace->id)->where('to_city_id', $toPlace->id)
                ->whereDate('departure_date', '>=', Carbon::now('Europe/Stockholm'))->where('departure_date', $departureDate)->where('return_date', $returnDate)->first();

            if (!$flight) {
                $recommandations = Flight::where('from_city_id', $fromPlace->id)->where('to_city_id', $toPlace->id)
                    ->whereDate('departure_date', '>=', Carbon::now('Europe/Stockholm'))->whereNotNull('return_date')->limit(10)->get();
                foreach ($recommandations as $recommandation) {
                    $recSeats = AirplaneSeat::where('flight_id', $recommandation->id)->where('seat_class', $class)->first();
                    if ($recSeats->seat_count > 0) {
                        $recommandation['from'] = $from;
                        $recommandation['to']   = $to;
                        $recommandation['class']   = $class;
                        $return['recommend'][] = $recommandation;
                    }
                }
                $return['actual_flight'] = null;
            } else {
                $flight['from'] = $from;
                $flight['to']   = $to;
                $flight['class'] = $class;
                $return['actual_flight'] = $flight;
            }
        }
        return json_encode($return);
    }

    public function getCities()
    {
        $data = City::orderBy('id', 'desc')->limit(50)->get();
        return json_encode($data);
    }

    public function bookFlight()
    {
        $class = AirplaneSeat::where('flight_id',  $_GET['flight_id'])->where('seat_class', $_GET['class'])->first();
        $class->decrement('seat_count');
    }
}
