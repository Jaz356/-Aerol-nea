<?php

use App\Http\Controllers\Api\FlightController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PlaneController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/planes',[PlaneController::class, 'index'])->name('apiPlaneHome');
Route::get('/planes/{id}',[PlaneController::class, 'show'])->name('apiPlaneShow');
Route::post('/planes',[PlaneController::class, 'store'])->name('apiPlaneStore');
Route::put('/planes/{id}',[PlaneController::class, 'update'])->name('apiPlaneUpdate');
Route::delete('/planes/{id}',[PlaneController::class, 'destroy'])->name('apiPlaneDestroy');

Route::get('/flight',[FlightController::class, 'index'])->name('apiFlightHome');
Route::get('/flight/{id}',[FlightController::class, 'show'])->name('apiFlightShow');
Route::post('/flight',[FlightController::class, 'store'])->name('apiFlightStore');
Route::put('/flight/{id}',[FlightController::class, 'update'])->name('apiFlightUpdate');
Route::delete('/flight/{id}',[FlightController::class, 'destroy'])->name('apiFlightDestroy');
