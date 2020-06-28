<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class OrdersProduct extends Model
{
    public function products()
    {
        return $this->hasOne('App\Product', 'id', 'product_id');
    }
}
