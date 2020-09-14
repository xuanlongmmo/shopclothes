<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\product;

class section_content extends Model
{
    protected $table = 'section_content';
    public $timestamps = false;

    public function product()
    {
        return $this->hasMany('App\product', 'id', 'id_product');
    }

}
