<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';

    public function getTotalPrice(){
        return $this->hasMany(
            'App\model\OrderItem','order_id');
    }
    public function getDiscount(){
        return $this->belongsTo(
            'App\model\Coupon','coupon_id');
    }
}
