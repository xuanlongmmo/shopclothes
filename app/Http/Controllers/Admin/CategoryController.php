<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\large_category_product;
use App\small_category_product;

class CategoryController extends Controller
{
    public function getcategory(){
        $large_category_product = large_category_product::all();
        $small_category_product = small_category_product::all();
        return view('admin.category.index',compact('large_category_product','small_category_product'));
    }
}
