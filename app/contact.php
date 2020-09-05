<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class contact extends Model
{
    protected $table = 'contact';
    public $timestamps = false; 

    protected $fillable = [
        'name', 
        'email',
        'title',
        'phone',
        'content',
    ];
    
}
