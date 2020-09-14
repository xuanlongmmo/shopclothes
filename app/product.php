<?php

namespace App;

use App\detail_product;
use App\review_product;
use App\small_category_product;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    protected $table = 'product';
    public $timestamps = false;

    public function detail_product()
    {
        return $this->hasMany('App\detail_product', 'id_product', 'id');
    }
    	
    public function large_category_product()
    {
        return $this->hasOne('App\large_category_product', 'id_large_category', 'id_large_category');
    }

    public function small_category_product()
    {
        return $this->hasOne('App\small_category_product', 'id_small_category', 'id_small_category');
    }

    public function review()
    {
        return $this->hasMany('App\review_product', 'id_product', 'id');
    }
    
    
    public function user()
    {
        return $this->hasOne('App\User', 'id', 'id_user');
    }
    
    
}
