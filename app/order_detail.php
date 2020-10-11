<?php

namespace App;
use App\order;
use App\product;

use Illuminate\Database\Eloquent\Model;

class order_detail extends Model
{
    protected $table = 'order_detail';
    public $timestamps = false;
    
    public function order()
    {
        return $this->hasOne('App\order', 'id', 'id_order');
    }
    
    public function product()
    {
        return $this->hasOne('App\product', 'id', 'id_product');
    }

}
