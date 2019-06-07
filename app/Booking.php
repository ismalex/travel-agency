<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
   //
   public $timestamps = true;
   // protected $fillable = ['locationid'];

   public function users(){
    return $this->belongsTo('App\User');
   }
}
