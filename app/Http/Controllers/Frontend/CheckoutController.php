<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

use App\cart;   
use App\wards;   
use App\provinces;   
use App\districts;   
use App\method_payment;   
use App\method_ship;   
use App\discount;   
use App\order;   
use App\order_detail;   
use App\product;   

class CheckoutController extends Controller
{
    //Thanh toán
    public function checkout(){
        if (Auth::check()) {
            if(intval(session('count'))>0){
                $wards = wards::all();
                $provinces = provinces::all();
                $districts = districts::all();
                $method_payment = method_payment::all();
                $method_ship = method_ship::all();
                $data = cart::where('id_user',Auth::user()->id)->get();
                return view('frontend.checkout.customerlogin',compact('data','provinces','wards','districts','method_payment','method_ship'));
            }else{
                return redirect()->back();
            }
        } else {
            if(intval(session('count'))>0){
                $wards = wards::all();
                $provinces = provinces::all();
                $districts = districts::all();
                $method_payment = method_payment::all();
                $method_ship = method_ship::all();
                $dataproduct = new product();
                $idproduct = '';
                foreach(session('product') as $key=>$value){
                    if ($idproduct == null) {
                        $idproduct = $idproduct.$key;
                    } else {
                        $idproduct = $idproduct.','.$key;     
                    }
                }
                $data = $dataproduct->whereRaw("id IN({$idproduct})")->get();
                return view('frontend.checkout.guests',compact('data','provinces','wards','districts','method_payment','method_ship'));
            }else{
                return redirect()->back();
            }
        }
    }

    public function postcode(Request $request){
        $check = 0;
        $errors = '';
        $discount = discount::all();
        foreach($discount as $item){
            //Kiểm tra code
            if($item->code == $request->code){
                $now = Carbon::now();
                $expired = $item->expired;
                //Kiểm tra hạn sử dụng
                if($now->lessThan($expired)) { 
                    //Kiểm tra điều kiện
                    if($item->condition <= $request->total) { 
                        $check = 1;
                        $totalsale = ($request->total * $item->percent)/100;
                        if(!empty($item->max_sale)){
                            if($totalsale >= $item->max_sale){
                                $totalsale = $item->max_sale;
                            }
                        }
                        break;
                    }else{
                        $errors = 'Mã giảm giá áp dụng cho đơn hàng trên '.number_format($item->condition).' vnđ';
                    }
                }else{
                    $errors = 'Mã giảm giá đã hết hạn';
                }
            }else{
                $errors = 'Mã giảm giá không đúng';
            }
        }
        if($check == 1){
            return redirect()->route('frontend.checkout')->with('salecode', $totalsale);
        }else{
            return redirect()->route('frontend.checkout')->with('errors', $errors);
        }
    }

    public function postpayment(Request $request){
        $order = new order();
        if(Auth::check()){
            $cart = cart::where('id_user',Auth::user()->id)->get();
            $max = order::max('id');

            //Lưu thông tin đơn hàng
            $order->id = $max + 1;
            $order->fullname = $request->fullname;
            $order->email = $request->email;
            $order->phone = $request->phone;
            $order->id_user = Auth::user()->id;
            $order->money_sale = $request->sale;
            $order->total_pay = $request->totalpay;
            $order->address_ship = $request->address_ship;
            $order->address_bill = $request->address_bill;
            $order->id_method_payment = $request->optionspayment;
            $order->id_method_ship = $request->optionsship;
            $order->note = $request->note;
            $order->save();
            
            // Lưu thông tin chi tiết đơn hàng
            foreach($cart as $item){
                $order_detail = new order_detail();
                $order_detail->id_order = $max + 1;
                $order_detail->id_product = $item->id_product;
                $order_detail->quantity = $item->quantity;
                $order_detail->save();
            };
            $delete = cart::where('id_user',Auth::user()->id)->delete();
            session()->put('count',0);
            return redirect()->route('frontend.index');
        }else{
            $max = order::max('id');

            //Lưu thông tin đơn hàng
            $order->id = $max + 1;
            $order->fullname = $request->fullname;
            $order->email = $request->email;
            $order->phone = $request->phone;
            $order->money_sale = $request->sale;
            $order->total_pay = $request->totalpay;
            $order->address_ship = $request->address_ship;
            $order->address_bill = $request->address_bill;
            $order->id_method_payment = $request->optionspayment;
            $order->id_method_ship = $request->optionsship;
            $order->note = $request->note;
            $order->save();
            
            // Lưu thông tin chi tiết đơn hàng
            foreach(session('product') as $key=>$value){
                $order_detail = new order_detail();
                $order_detail->id_order = $max + 1;
                $order_detail->id_product = $key;
                $order_detail->quantity = $value;
                $order_detail->save();
            };
            session()->forget('product');
            session()->put('count',0);
            return redirect()->route('frontend.index');
        }

    }
}
