<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class discount extends Model
{
    
    public function user()
    {
        return $this->hasOne('App\User', 'id', 'id_user');
    }
    
}
