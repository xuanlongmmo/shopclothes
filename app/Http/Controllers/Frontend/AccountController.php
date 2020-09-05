<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

//Gọi model
use App\user;

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
            return redirect()->back();
        }
    }

    public function updateaccount(updateprofile $request){
        if(Auth::check()){
            $user = new user();
            if($request->image){
                $imageName = time().'_'.$request->image->getClientOriginalName();
                $request->image->move(public_path('sources/img/profile'), $imageName);
                $update = $user->where('id',Auth::user()->id)->update([
                    'fullname' => $request->name,
                    'phone' => $request->phone,
                    'address' => $request->address,
                    'image_profile' => 'sources/img/profile/'.$imageName
                ]);
                return redirect()->back();
            }else{
                $update = $user->where('id',Auth::user()->id)->update([
                    'fullname' => $request->name,
                    'phone' => $request->phone,
                    'address' => $request->address
                ]);
                return redirect()->back();
            }

        }else{
            return redirect()->back();
        }
    }
}
