<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Plane extends Model
{
    use HasFactory;
    protected $fillable = [
     'name',
     'model',
     'capacity',
];

   public function flights()
   {
       return $this->hasMany(Flight::class, 'plane_id', 'id');
   }
}
