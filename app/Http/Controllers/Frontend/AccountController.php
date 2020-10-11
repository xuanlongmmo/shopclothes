<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

//Gọi model
use App\user;
use App\order;
use App\product;

//Gọi request
use App\Http\Requests\updateprofile;

class AccountController extends Controller
{
    //Tài khoản
    public function account(){
        if(Auth::check()){
            $user = user::find(Auth::user()->id);
            return view('frontend.account.index',compact('user'));
        }else{
            return redirect()->route('frontend.index');
        }
    }

    public function updateaccount(updateprofile $request){
        if(Auth::check()){
            $user = new user();
            $update = $user->where('id',Auth::user()->id)->update([
                'fullname' => $request->name,
                'phone' => $request->phone,
                'address' => $request->address
            ]);
            return redirect()->route('frontend.account')->with('success','Cập nhật thông tinph thành công');
        }else{
            return redirect()->route('frontend.index');
        }
    }

    public function update_image_profile(Request $request){
        if(Auth::check()){
            $user = new user();
            $imageName = time().'_'.$request->image->getClientOriginalName();
            $request->image->move(public_path('sources/img/profile'), $imageName);
            $update = $user->where('id',Auth::user()->id)->update([
                'image_profile' => 'sources/img/profile/'.$imageName
            ]);
            return redirect()->route('frontend.account');
        }else{
            return redirect()->route('frontend.index');
        }
    }

    public function changepass(){
        if(Auth::check()){
            return view('frontend.account.changepass');
        }else{
            return redirect()->route('frontend.index');
        }
    }

    public function postchangepass(Request $request){
        if(Auth::check()){
            if(Hash::check($request->oldpass, Auth::user()->password)){
                if($request->newpass == $request->renewpass){
                    $update = user::where('id',Auth::user()->id)->update([
                        'password' => bcrypt($request->renewpass)
                    ]);
                    return redirect()->route('frontend.account')->with('success','Đổi mật khẩu thành công');
                }else{
                    return redirect()->back()->with('errors','Mật khẩu mới phải trùng nhau');
                }
            }else{
                return redirect()->back()->with('errors','Mật khẩu cũ không đúng');
            }
        }else{
            return redirect()->route('frontend.index');
        }
    }

    public function purchase(){
        if(Auth::check()){
            $myorder = order::where('id_user',Auth::user()->id)->get();
            return view('frontend.account.purchase',compact('myorder'));
        }else{
            return redirect()->route('frontend.index');
        }
    }
    
    public function detailpurchase($id){
        if(Auth::check()){
            $data = order::find($id);
            if($data->id_user == Auth::user()->id){
                $idproduct = '';
                foreach($data->listproduct as $item){
                    if($idproduct == null){
                        $idproduct = $item->id_product;
                    }else{
                        $idproduct = $idproduct.','.$item->id_product;
                    }
                }
                $product = new product();
                $dataproduct = $product->whereRaw("id IN({$idproduct})")->get();
                return view('frontend.account.detailpurchase',compact('data','dataproduct'));
            }else{
                return redirect()->route('frontend.purchase');
            }
        }else{
            return redirect()->route('frontend.index');
        }
    }

    public function cancelorder($id){
        if(Auth::check()){
            $data = order::find($id);
            if($data->id_user == Auth::user()->id){
                $update = order::where('id',$id)->update([
                    'id_status' => 4
                ]);
                return redirect(url("account/detailpurchase/$id"));
            }else{
                return redirect()->route('frontend.purchase');
            }
        }else{
            return redirect()->route('frontend.index');
        }
    }
}
