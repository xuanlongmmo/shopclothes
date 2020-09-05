<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    //Thanh toán
    public function checkout(){
        return view('frontend.checkout.index');
    }
}
