<?php

use App\Http\Controllers\CitiesController;
use App\Http\Controllers\FlightController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('import', [CitiesController::class, 'importCities']);


Route::prefix('api/{token}')->middleware('auth_api')->group(function () {
    Route::get('/cities', [FlightController::class, 'getCities']);
Route::get('/find/flight', [FlightController::class, 'findFlight']);

Route::get('/book/flight', [FlightController::class, 'bookFlight']);
});




