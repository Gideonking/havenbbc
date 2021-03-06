<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
   public function leaders(){
       return $this->belongsToMany('App\Leader','leaders_positions');
   }
   public function ministry(){
    return $this->belongsTo('App\Ministry');
}
}
