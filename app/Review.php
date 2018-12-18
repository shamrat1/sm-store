<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    public function subproduct(){
       return $this->belongsTo('App\Subproduct');
    }

    public function user(){
       return $this->belongsTo('App\User');
    }
}
