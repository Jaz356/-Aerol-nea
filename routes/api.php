<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlaneController;
use App\Http\Controllers\FlightController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/planes',[PlaneController::class, 'index'])->name('apiHome');
Route::get('/planes/{id}',[PlaneController::class, 'show'])->name('apiShow');
Route::post('/planes',[PlaneController::class, 'store'])->name('apiStore');
Route::put('/planes/{id}',[PlaneController::class, 'update'])->name('apiUpdate');
Route::delete('/planes/{id}',[PlaneController::class, 'destroy'])->name('apiDestroy');

Route::get('/flight',[FlightController::class, 'index'])->name('apiHome');
Route::get('/flight/{id}',[FlightController::class, 'show'])->name('apiShow');
Route::post('/flight',[FlightController::class, 'store'])->name('apiStore');
Route::put('/flight/{id}',[FlightController::class, 'update'])->name('apiUpdate');
Route::delete('/flight/{id}',[FlightController::class, 'destroy'])->name('apiDestroy');
