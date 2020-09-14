<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class comment_news extends Model
{
    protected $fillable = [
        'fullname',
        'email',
        'image',
        'content',
        'id_news'
     ]; 
}
