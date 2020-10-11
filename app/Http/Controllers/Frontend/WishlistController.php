<?php

namespace App\Http\Controllers\Frontend;

use App\user;
use App\product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    //Yêu thích
    public function wishlist(){
        if(Auth::check()){
            $dataproduct = new product;
            $wishlist = Auth::user()->wishlist;
            if(empty($wishlist)){
                $data = [];
            }else{
                $data = $dataproduct->whereRaw("id IN({$wishlist})")->get();
            }
            return view('frontend.wishlist.index',compact('data'));
        }else{
            return redirect()->route('frontend.login');
        }
    }

    //Thêm vào yêu thích
    public function addwishlist(){
        if(isset($_GET['id']) && !empty($_GET['id'])){
            $id = $_GET['id'];
            if(Auth::check()){
                $user = user::find(Auth::user()->id);
                $db = new user();
                if(empty($user->wishlist)){
                    $update = $db->where('id',Auth::user()->id)->update([
                        'wishlist' => $id
                    ]);
                    return redirect()->back();
                }else{
                    $array = explode(',',$user->wishlist);
                    $check = 0;
                    foreach($array as $item){
                        if($item==$id){
                            $check = 1;
                        }
                    }
                    if($check == 0){
                        $wishlist = $user->wishlist.','.$id;
                        $update = $db->where('id',Auth::user()->id)->update([
                            'wishlist' => $wishlist
                        ]);
                        return redirect()->back();
                    }else{
                        return redirect()->back();
                    }
                }
            }else{
                echo "<script>alert('Bạn phải đăng nhập mới thêm được vào yêu thích!!');history.back();</script>";
                return redirect()->route('frontend.login');
            }
        }else{
            return redirect()->route('frontend.index');
        }
    }

    public function deletewishlist(){
        if(isset($_GET['id']) && !empty($_GET['id'])){
            if(Auth::check()){
                $id = $_GET['id'];
                $wishlist = Auth::user()->wishlist;
                $array = explode(',',$wishlist);
                for($i=0;$i<count($array);$i++){
                    if($array[$i]==$id){
                        unset($array[$i]);
                    }
                }
                $wishlist = implode(',',$array);
                $db = new user();
                $update = $db->where('id',Auth::user()->id)->update([
                    'wishlist' => $wishlist
                ]);
                return redirect()->back();
            }else{
                return redirect()->route('frontend.index');
            }
        }else{
            return redirect()->route('frontend.wishlist');
        }
    }
}
