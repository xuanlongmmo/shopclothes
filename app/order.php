<?php

namespace App;
use App\method_payment;
use App\method_ship;
use App\order_status;
use App\user;


use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    protected $table = 'order';
    // protected $fillable = [
    //     'name',
    //     'price',
    //     'quantity',
    // ];

    
    public function method_payment()
    {
        return $this->hasOne('App\method_payment', 'id', 'id_method_payment');
    }

    public function method_ship()
    {
        return $this->hasOne('App\method_ship', 'id', 'id_method_ship');
    }

    public function status()
    {
        return $this->hasOne('App\order_status', 'id', 'id_status');
    }

    public function user_approver()
    {
        return $this->hasOne('App\user', 'id', 'id_user_approver');
    }
    
    public function user()
    {
        return $this->hasOne('App\user', 'id', 'id_user');
    }
 
    public function listproduct()
    {
        return $this->hasMany('App\order_detail', 'id_order', 'id');
    }
   
    
}
