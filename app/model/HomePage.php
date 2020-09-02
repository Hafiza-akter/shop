<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class HomePage extends Model
{
    protected $table = 'homepage_setting';

    public function getCategory(){
        return $this->belongsTo('App\model\Category','category1');
    }
    public function getCategory2(){
        return $this->belongsTo('App\model\Category','category2');
    }
    public function getCategory3(){
        return $this->belongsTo('App\model\Category','category3');
    }
    

}
