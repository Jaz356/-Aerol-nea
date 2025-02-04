<?php

use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlaneController;

Route::get('/planes',[PlaneController::class, 'index'])->name('apiHome');
Route::get('/planes/{id}',[PlaneController::class, 'show'])->name('apiShow');
Route::post('/planes',[PlaneController::class, 'store'])->name('apiStore');
Route::put('/planes/{id}',[PlaneController::class, 'update'])->name('apiUpdate');
Route::delete('/planes/{id}',[PlaneController::class, 'destroy'])->name('apiDestroy');
