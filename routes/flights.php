<?php

use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FlightController;

Route::get('/flight',[FlightController::class, 'index'])->name('apiHome');
Route::get('/flight/{id}',[FlightController::class, 'show'])->name('apiShow');
Route::post('/flight',[FlightController::class, 'store'])->name('apiStore');
Route::put('/flight/{id}',[FlightController::class, 'update'])->name('apiUpdate');
Route::delete('/flight/{id}',[FlightController::class, 'destroy'])->name('apiDestroy');
