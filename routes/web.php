<?php

use Illuminate\Support\Facades\Route;

Route::get('/flight-board', function () {
    $flights = App\Models\Flight::all();
    return view('flight_board', ['flights' => $flights]);
});

Route::get('/booking', function () {
    return view('booking');
});

Route::post('/book-flight', 'BookingController@store');

Route::get('/booked', 'BookingController@index');

Route::get('/flight-logs', function () {
    $logs = App\Models\Flight::all();
    return view('flight_logs', ['logs' => $logs]);
});