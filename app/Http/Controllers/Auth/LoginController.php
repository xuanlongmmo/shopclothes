<?php

namespace App\Http\Controllers\Auth;

use App\user;
use App\Http\Requests\register;
use App\Http\Requests\login;
use Validator,Redirect,Response,File;
use Socialite;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\cart;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function getlogin(){
        if(Auth::check()){
            return redirect()->route('frontend.index');
        }else{
            return view('frontend.account.login');
        }
    }

    public function login(login $request){
        $username = $request->username;
        $password = $request->password;
        if(Auth::attempt(['username' => $username, 'password' => $password]) || Auth::attempt(['email' => $username, 'password' => $password]) ){
            $count = 0;
            $db = new cart();
            $cart = $db->where('id_user',Auth::user()->id)->get();
            foreach($cart as $item){
                $count = $count + $item->quantity;
            }
            session()->put('count',$count);
            return redirect()->route('frontend.index');
        }else{
            return redirect()->route('frontend.login');
        }
    }

    public function register(){
        return view('frontend.account.register');
    }

    public function pregister(register $request){
        $user = user::create($request->all());
        $user->password = bcrypt($request->password);
        $user->save();
        if(Auth::attempt(['username' => $request->username, 'password' => $request->password]) || Auth::attempt(['email' => $request->email, 'password' => $request->password]) ){
            session()->put('count',0);
            return redirect()->route('frontend.index');
        }
    }

    public function logout(){
        if(Auth::check()){
            session()->flush();
            Auth::logout();
            return redirect()->route('frontend.index');
        }else{
            return redirect()->route('frontend.index');
        }
    }
    
    public function getreset(){
        return view('frontend.account.resetpassword');
    }
}
