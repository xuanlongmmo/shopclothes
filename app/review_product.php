<?php

namespace App;
use App\User;

use Illuminate\Database\Eloquent\Model;

class review_product extends Model
{
    protected $table = 'review_product';
    public $timestamps = true;

    protected $fillable = [
        'id_product', 
        'id_user',
        'star',
        'content',
    ];

    public function user()
    {
        return $this->hasOne('App\User', 'id', 'id_user');
    }
    
}
