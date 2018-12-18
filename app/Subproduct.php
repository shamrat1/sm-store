<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subproduct extends Model
{
    public function product(){
        return $this->belongsTo('App\Product');
    }

    public function review(){
        return $this->hasMany('App\SubReviews');
    }
}
