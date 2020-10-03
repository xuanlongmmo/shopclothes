<?php

namespace App;

use App\detail_product;
use App\review_product;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    protected $table = 'product';
    public $timestamps = true;

    protected $fillable = [
        'id',
        'product_name',
        'link_image',
        'price',
        'sale_percent',
        'description',
        'status',
        'id_user',
        'large_category',
        'small_category',
     ]; 
    public function detail_product()
    {
        return $this->hasMany('App\detail_product', 'id_product', 'id');
    }
    	
    public function get_large_category()
    {
        return $this->hasOne('App\category_product', 'id', 'large_category');
    }

    public function get_small_category()
    {
        return $this->hasOne('App\category_product', 'id', 'small_category');
    }

    public function review()
    {
        return $this->hasMany('App\review_product', 'id_product', 'id');
    }
    
    
    public function user()
    {
        return $this->hasOne('App\User', 'id', 'id_user');
    }
    
    
    public function image_product()
    {
        return $this->hasMany('App\image_product', 'id_product', 'id');
    }
    
}
