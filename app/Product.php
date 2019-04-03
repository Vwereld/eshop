<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
//    protected $primaryKey = 'id';
    public function categories(){
        return $this->belongsToMany('App\Category','category_product');
    }
}
