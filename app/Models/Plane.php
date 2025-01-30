<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Plane extends Model
{
   public function flights()
   {
       return $this->hasMany(Flight::class);
   }
}
