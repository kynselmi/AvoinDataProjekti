<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Observation extends Model
{
    public function Bird() {
        return $this -> hasOne('App\Bird');
    }

    public function Location() {
        return $this -> hasOne('App\Location');
    }

    public function Person() {
         return $this -> hasOne('App\Person');
    }
}
