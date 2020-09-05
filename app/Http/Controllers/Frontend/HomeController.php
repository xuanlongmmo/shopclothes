<?php

namespace App\Http\Controllers\Frontend;

//Gọi model
use App\large_category_product;
use App\User;
use App\banner;
use App\section;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    // Trang chủ
    public function getIndex(){
        $large_banners = banner::where('type',1)->get();
        $small_banners = banner::where('type',2)->get();
        $sections = section::all();
        return view('frontend.home',compact('large_banners','small_banners','sections'));
    }

}