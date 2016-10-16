<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    public function Bird() {
        $this -> hasOne('App/Bird');
    }


}
