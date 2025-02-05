<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlaneController;
use App\Http\Controllers\FlightController;

Route::get('/', function () {
        return view('welcome');
    });

Route::resource('flights', FlightController::class);
Route::resource('planes', PlaneController::class);