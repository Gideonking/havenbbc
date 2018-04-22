<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Leader extends Model
{
  
    public function positions(){
        return $this->belongsToMany('App\Position','leaders_positions');
    }

}
