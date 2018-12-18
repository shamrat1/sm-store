<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubReviews extends Model
{
    public function subproduct(){
        $this->belongsTo('App\SubReviews');
    }
    public function user(){
        return $this->belongsTo('App\User');
    }
}
