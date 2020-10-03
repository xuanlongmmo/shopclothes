<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Http\Requests\login;

use App\user;
use App\cart;

class AdminController extends Controller
{
    public function admin(){
        $users = user:: all();
        $userthismonth = 0;
        $userlastmonth = 0;
        foreach($users as $user){
            if($user->created_at->format('m') == Carbon::now()->month){
                $userthismonth++;
            }
            if($user->created_at->format('m') == (Carbon::now()->month)-1){
                $userlastmonth++;
            }
        }
        return view('admin.dashboard.index',compact('userthismonth','userlastmonth'));
    }

    public function login(){
        if(Auth::check()){
            return redirect()->route('admin');
        }else{
            return view('admin.account.login');
        }
    }

    public function postlogin(login $request){
        if(Auth::attempt(['username' => $request->username, 'password' => $request->password])){
            $count = 0;
            $db = new cart();
            $cart = $db->where('id_user',Auth::user()->id)->get();
            foreach($cart as $item){
                $count = $count + $item->quantity;
            }
            session()->put('count',$count);
            return redirect()->route('admin');
        }else{
            return redirect()->route('admin.login');
        }
    }

    public function logout(){
        if(Auth::check()){
            session()->flush();
            Auth::logout();
            return redirect()->route('admin.login');
        }else{
            return view('admin.account.login');
        }
    }
}
