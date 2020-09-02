<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    protected $table = 'sub_category';

    public function getCategoryInfo(){
        return $this->belongsTo(
                'App\model\Category','category_id');
    }
}
