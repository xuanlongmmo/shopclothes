<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class small_category_product extends Model
{
    protected $table = 'small_category_product';
    public $timestamps = false;

    
    public function large_category_product()
    {
        return $this->hasOne('App\large_category_product', 'id_large_category', 'id_large_category');
    }
    
}
