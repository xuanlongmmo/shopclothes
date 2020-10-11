<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\discount;

class DiscountController extends Controller
{
    public function index(){
        $datadiscount = discount::all();
        return view('admin.discount.index',compact('datadiscount'));
    }

    public function adddiscount(){
        return view('admin.discount.add');
    }

    public function postadddiscount(){
        
    }

    public function deletediscount(){

    }
}
