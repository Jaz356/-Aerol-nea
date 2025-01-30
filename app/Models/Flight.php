<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Flight extends Model
{
    public function departureAirport()
    {
    return $this->belongsTo(Flight::class, 'departure');
    }
}