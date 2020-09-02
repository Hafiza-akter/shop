<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    public function getCategoryInfo(){
        return $this->belongsTo(
                'App\model\Category','categoty_id');
    }

    public function getProductImages(){
        return $this->hasMany(
            'App\model\ProductImage','product_id');
    }
    
}
