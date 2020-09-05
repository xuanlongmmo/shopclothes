<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class branch extends Model
{
    protected $table = 'branch';
    public $timestamps = false;

    protected $fillable = [
        'branch_name', 'email', 'phone', 'address' , 'facebook' , 'twitter' , 'instagram' , 'youtube' , 'bank_name' , 'bank_number' , 'name_company'
    ];
}
