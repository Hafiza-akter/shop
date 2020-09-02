<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    protected $table = 'order_items';

    public function getOrderDetails(){
        return $this->belongsTo('App\model\Order','order_id');
    }
    public function getProducts(){
        return $this->belongsTo('App\model\Product','product_id');
    }
}
