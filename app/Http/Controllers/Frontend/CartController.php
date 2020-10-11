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
            $data = cart::where('id_user',Auth::user()->id)->get();
            return view('frontend.cart.index',compact('data'));
        }else{
            $dataproduct = new product();
            if(intval(session('count')) > 0){
                $idproduct = '';
                foreach(session('product') as $key=>$value){
                    if ($idproduct == null) {
                        $idproduct = $idproduct.$key;
                    } else {
                        $idproduct = $idproduct.','.$key;     
                    }
                }
                $data = $dataproduct->whereRaw("id IN({$idproduct})")->get();
            }else{
                $data = [];
            }
            return view('frontend.cart.index',compact('data'));
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
            return redirect()->back();
        }else{
            return redirect()->back();
        }
    }

    public function reducequantity(){
        if(isset($_GET['id']) && !empty($_GET['id'])){
            $id = $_GET['id'];
            if(Auth::check()){
                $product = cart::where('id_user',Auth::user()->id)->where('id_product',$id)->get();
                if ($product[0]->quantity == 1) {
                    $delete = cart::where('id_user',Auth::user()->id)->where('id_product',$id)->delete();
                } else {
                    $newquantity = $product[0]->quantity - 1;
                    $update = cart::where('id_user',Auth::user()->id)->where('id_product',$id)->update([
                        'quantity' => $newquantity
                    ]);
                }
                $count = intval(session('count'));
                $count--;
                session()->put('count',$count);
            }else{
                foreach(session('product') as $key=>$value){
                    if($key == $id){
                        $oldquantity = $value;
                        if($oldquantity==1){
                            session()->forget("product.{$key}");
                        }else{
                            session()->put("product.{$key}",$oldquantity-1);
                        }
                        $count = intval(session('count'));
                        $count--;
                        session()->put('count',$count);
                    }
                }
            }
            return redirect()->back();
        }else{
            return redirect()->back();
        }
    }

    public function updatequantity(){
        if(isset($_GET['id']) && !empty($_GET['id'])){
            $id = $_GET['id'];
            if(Auth::check()){
                $product = cart::where('id_user',Auth::user()->id)->where('id_product',$id)->get();
                $newquantity = $product[0]->quantity + 1;
                $update = cart::where('id_user',Auth::user()->id)->where('id_product',$id)->update([
                    'quantity' => $newquantity
                ]);
                $count = intval(session('count'));
                $count++;
                session()->put('count',$count);
            }else{
                foreach(session('product') as $key=>$value){
                    if($key == $id){
                        $oldquantity = $value;
                        session()->put("product.{$key}",$oldquantity+1);
                        $count = intval(session('count'));
                        $count++;
                        session()->put('count',$count);
                    }
                }
            }
            return redirect()->back();
        }else{
            return redirect()->back();
        }
    }

    public function deletecart(){
        if(isset($_GET['id']) && !empty($_GET['id'])){
            $id = $_GET['id'];
            if(Auth::check()){
                $product = cart::where('id_user',Auth::user()->id)->where('id_product',$id)->get();
                $quantity = $product[0]->quantity;
                $delete = cart::where('id_user',Auth::user()->id)->where('id_product',$id)->delete();
            }else{
                foreach(session('product') as $key=>$value){
                    if($key == $id){
                        $quantity = $value;
                        session()->forget("product.{$key}");
                    }
                }
            }
            $count = intval(session('count'));
            $count = $count - $quantity;
            session()->put('count',$count);
            return redirect()->back();
        }else{
            return redirect()->back();
        }
    }

    public function resetcart(){
        session()->flush();
    }
}
