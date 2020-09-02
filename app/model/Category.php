<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = "category";

    public function getSubCategories(){
        return $this->hasMany(
            'App\model\SubCategory','category_id');
    }
    public function getProduct(){
        return $this->hasMany('App\model\Product', 'category_id');
    }

}
