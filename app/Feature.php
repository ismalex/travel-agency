<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    //
    public function Locations()
    {
        return $this->belongsToMany('App\Location');
    } 
}
