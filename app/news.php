<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class news extends Model
{
    
    public function user()
    {
        return $this->hasOne('App\User', 'id', 'id_user');
    }
    
    
    public function comments()
    {
        return $this->hasMany('App\comment_news', 'id_news', 'id');
    }
    
    
    public function category()
    {
        return $this->hasOne('App\category_news', 'id', 'id_category');
    }
    
}
