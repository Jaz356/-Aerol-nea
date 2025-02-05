<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Flight extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'flight_no', 'date', 'departure_time', 'arrival_time', 'departure', 'arrival', 'booked_seats', 'plane_id', 'available'
    ];
}