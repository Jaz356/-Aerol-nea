<?php

use App\Http\Controllers\Api\FlightController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\BookingController;
use App\Http\Controllers\Api\PlaneController;
use App\Http\Controllers\PlaneController as ControllersPlaneController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/Bookings',[BookingController::class, 'index'])->name('apiBookingHome');
Route::get('/Bookings/{id}',[BookingController::class, 'show'])->name('apiBookingShow');
Route::post('/Bookings',[BookingController::class, 'store'])->name('apiBookingStore');
Route::put('/Bookings/{id}',[BookingController::class, 'update'])->name('apiBookingUpdate');
Route::delete('/Bookings/{id}',[BookingController::class, 'destroy'])->name('apiBookingDestroy');

Route::get('/flight',[FlightController::class, 'index'])->name('apiFlightHome');
Route::get('/flight/{id}',[FlightController::class, 'show'])->name('apiFlightShow');
Route::post('/flight',[FlightController::class, 'store'])->name('apiFlightStore');
Route::put('/flight/{id}',[FlightController::class, 'update'])->name('apiFlightUpdate');
Route::delete('/flight/{id}',[FlightController::class, 'destroy'])->name('apiFlightDestroy');

Route::get('/flights', 'FlightController@index');
Route::get('/flights/{id}', 'FlightController@show');
Route::delete('/flights/{id}', 'FlightController@destroy');

Route::get('/plane',[PlaneController::class, 'index'])->name('apiPlaneHome');
Route::get('/plane/{id}',[PlaneController::class, 'show'])->name('apiPlaneShow');
Route::post('/plane',[PlaneController::class, 'store'])->name('apiPlaneStore');
Route::put('/plane/{id}',[PlaneController::class, 'update'])->name('apiPlaneUpdate');
Route::delete('/plane/{id}',[PlaneController::class, 'destroy'])->name('apiPlaneDestroy');