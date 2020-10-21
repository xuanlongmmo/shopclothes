<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Http\Requests\login;

use App\user;
use App\order;
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

        $order = order::all();
        $totalpaythismonth = 0;
        $totalpaylastmonth = 0;
        $orderthismonth = 0;
        $orderlastmonth = 0;
        $year = array();
        foreach($order as $item){
            if($item->created_at->format('m') == Carbon::now()->month && $item->created_at->format('Y') == Carbon::now()->year ){
                $orderthismonth++;
            }
            if($item->created_at->format('m') == (Carbon::now()->month)-1 && $item->created_at->format('Y') == Carbon::now()->year ){
                $orderlastmonth++;
            }
            if($item->created_at->format('m') == Carbon::now()->month && $item->id_status == 3 && $item->created_at->format('Y') == Carbon::now()->year ){
                $totalpaythismonth = $totalpaythismonth + $item->total_pay;
            }
            if($item->created_at->format('m') == (Carbon::now()->month)-1 && $item->id_status == 3 && $item->created_at->format('Y') == Carbon::now()->year ){
                $totalpaylastmonth = $totalpaylastmonth + $item->total_pay;
            }
        }
        foreach($order as $item){
            $year[] = $item->created_at->format('Y');
        }
        $year = array_unique($year); //Những năm có đơn hàng
        sort($year);
        $year = array_flip($year); 
        foreach($year as $key=>$item){
            $year[$key] = array(0,0,0,0,0,0,0,0,0,0,0,0);
            foreach($order as $orde){
                if($orde->id_status == 3 && $orde->created_at->format('Y') == $key){
                    // $item->created_at->format('m') == (Carbon::now()->month)-1 &&
                    for($i=0;$i<12;$i++){
                        if($orde->created_at->format('m') == $i+1){
                            $year[$key][$i] = $year[$key][$i] + $orde->total_pay;
                        }
                    }
                }
            }
        }
        // dd($year);
        return view('admin.dashboard.index',compact('userthismonth','userlastmonth','order','totalpaythismonth','totalpaylastmonth','orderthismonth','orderlastmonth','year'));
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
