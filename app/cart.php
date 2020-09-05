<?php

namespace App;

//Gọi model
use App\User;
use App\product;

use Illuminate\Database\Eloquent\Model;

class cart extends Model
{
    protected $table = 'cart';
    public $timestamps = false; 

    protected $fillable = [
        'id_user', 
        'id_product',
        'quantity',
    ];

    public function user()
    {
        return $this->hasOne('App\User', 'id_user', 'id');
    }
    
    public function product()
    {
        return $this->hasMany('App\product', 'id_product', 'id');
    }
}
