<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function subproduct(){
        return $this->hasMany('App\Subproduct');
    }
}
