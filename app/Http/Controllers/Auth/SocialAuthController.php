<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Socialite, Auth, Redirect, Session, URL;
use App\User;
use App\cart;

class SocialAuthController extends Controller
{
    /**
     * Chuyển hướng người dùng sang OAuth Provider.
     *
     * @return Response
     */
    public function redirectToProvider($provider)
    {
        if(!Session::has('pre_url')){
            Session::put('pre_url', URL::previous());
        }else{
            if(URL::previous() != URL::to('login')) Session::put('pre_url', URL::previous());
        }
        return Socialite::driver($provider)->redirect();
    }  

    /**
     * Lấy thông tin từ Provider, kiểm tra nếu người dùng đã tồn tại trong CSDL
     * thì đăng nhập, ngược lại nếu chưa thì tạo người dùng mới trong SCDL.
     *
     * @return Response
     */
    public function handleProviderCallback($provider)
    {
        $user = Socialite::driver($provider)->user();

        $authUser = $this->findOrCreateUser($user, $provider);
        Auth::login($authUser, true);
        $count = 0;
        $db = new cart();
        $cart = $db->where('id_user',Auth::user()->id)->get();
        if($cart){
            foreach($cart as $item){
                $count = $count + $item->quantity;
            }
        }else{
            $count = 0;
        }
        session()->put('count',$count);
        return redirect()->route('frontend.index');
    }

    /**
     * @param  $user Socialite user object
     * @param $provider Social auth provider
     * @return  User
     */
    public function findOrCreateUser($user, $provider)
    {
        $authUser = User::where('provider_id', $user->id)->first();
        if ($authUser) {
            return $authUser;
        }
        
        if (User::where('email', '=', $user->email)->count() > 0) {
            return User::create([
                'fullname'     => $user->name,
                'username' => $user->id,
                'provider' => $provider,
                'provider_id' => $user->id
            ]);
        }else{
            return User::create([
                'fullname'     => $user->name,
                'email'    => $user->email,
                'username' => $user->id,
                'provider' => $provider,
                'provider_id' => $user->id
            ]);
        }
    }
}
