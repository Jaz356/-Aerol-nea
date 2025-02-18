<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Flight extends Model
{
    use HasFactory;

    protected $fillable = ['number', 'destination', 'departure_time', 'arrival_time', 'departure', 'arrival', 'booked_seats', 'plane_id', 'available'];

    public function plane()
    {
        return $this->belongsTo(Plane::class);
    }
}