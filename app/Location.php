<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    //
    public function Featurescodes()
    {
      return $this->hasMany('App\Featureslocation');
    }

    public function Features()
    {
      return $this->belongsToMany('App\Feature');
    }
}
