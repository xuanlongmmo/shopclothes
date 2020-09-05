<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\small_category_product;

class large_category_product extends Model
{
    protected $table = 'large_category_product';
    public $timestamps = false;

    public function small_category_product(){
        return $this->hasMany('App\small_category_product', 'id_large_category', 'id_large_category');     
    }
}
