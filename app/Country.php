<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    // Relation Country -< Locations
    public function Locations()
    {
        return $this->hasMany('App\Location');
    }

    
}
