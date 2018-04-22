<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
   public function leaders(){
       return $this->belongsToMany(Leader::class,'leader_id');
   }
   public function ministry(){
    return $this->belongsTo('App\Ministry');
}
}
