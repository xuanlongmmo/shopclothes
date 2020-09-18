<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class import_goods extends Model
{
    protected $table = 'import_goods';
    public $timestamps = true;

    
    public function product()
    {
        return $this->hasOne('App\product', 'id', 'id_product');
    }
    
    public function user()
    {
        return $this->hasOne('App\User', 'id', 'id_user');
    }
    
}
