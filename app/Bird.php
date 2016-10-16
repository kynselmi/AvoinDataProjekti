<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bird extends Model
{
    public function Observations() {
        return $this -> hasMany('App\Observation');
    }

}
