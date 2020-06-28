<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Product extends Model
{
    public function reviews(){
        return $this->belongsToMany('App\Review', 'reviews','id', 'product_id');
    }
}
