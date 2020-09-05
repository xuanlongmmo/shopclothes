<?php

namespace App\Http\Controllers\Frontend;

use App\product;
use App\cart;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;    

class CartController extends Controller
{
    //Giỏ hàng
    public function cart(){
        if(Auth::check()){
            $cart = cart::where('id_user',Auth::user()->id)->join('product', 'cart.id_product', 'product.id')->get();
            return view('frontend.cart.index',compact('cart'));
        }
    }

    public function addcart(){
        if(isset($_GET['id']) && !empty($_GET['id'])){
            $id = $_GET['id'];
            if(Auth::check()){
                $cart = cart::where('id_user',Auth::user()->id)->get();
                $check = 0;
                $count = session('count');
                foreach($cart as $item){
                    if($item->id_product == $id){
                        $check = 1;
                    }
                }
                if($check==1){
                    $cart = cart::where('id_user',Auth::user()->id)->where('id_product',$id)->get('quantity');
                    $quantity = $cart[0]->quantity;
                    $db = new cart();
                    $update = $db->where('id_user', Auth::user()->id)->where('id_product',$id)->update([
                        'quantity' => $quantity + 1
                    ]);
                    $count++;
                    session()->put('count',$count);
                }else{
                    $db = new cart();
                    $db->id_product = $id;
                    $db->id_user = Auth::user()->id;
                    $db->quantity = 1;
                    $db->save();
                    $count++;
                    session()->put('count',$count);
                }
            }else{
                if(session("product.{$id}")>0){
                    $oldquantity = intval(session("product.{$id}"));
                    $newquantity = $oldquantity+1;
                    session()->put("product.{$id}",$newquantity);
                }else{
                    session()->put("product.{$id}",1);
                }
                if(session('count')&&session('count')>0){
                    $count = intval(session('count'));
                }else{
                    $count = 0;
                }
                $count++;
                session()->put('count',$count);
            }
            return $count;
        }
    }

    public function resetcart(){
        session()->flush();
    }
}
