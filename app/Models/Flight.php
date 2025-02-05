<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Flight extends Model
{
    use HasFactory;

    protected $fillable = [
        'flight_no',
        'departure',
        'destination',
        'departure_time',
        'arrival_time',
        'plane_id',
    ];
    
    public function departureAirport()
    {
    return $this->belongsTo(Flight::class, 'departure');
    }
}