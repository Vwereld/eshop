<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoryProduct extends Model
{
    public function products(){
        return $this->belongsToMany('App\Product','products');
    }

    public function categories(){
        return $this->belongsToMany('App\Category','category');
    }
}
