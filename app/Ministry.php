<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ministry extends Model
{
   public function positions(){
       return $this->hasMany('App\Position');
   }
}
