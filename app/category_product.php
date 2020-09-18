<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class category_product extends Model
{
    protected $table = 'category_product';
    public $timestamps = true; 
    
    public function user()
    {
        return $this->hasOne('App\User', 'id', 'id_user');
    }
    
}
