<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Mail;

use App\user;
use App\permissions;
use App\comment_news;
use App\user_has_permissions;

class AccountController extends Controller
{
    public function listuser(){
        $listuser = user::where('id_role',3)->get();
        return view('admin.account.listuser',compact('listuser'));
    }
 
    public function deleteuser($id){
        $user = user::find($id);
        if($user->id_role == 3){
            $data = [];

            Mail::send('frontend.email.maildeleteuser', $data, function ($message) use($user) {
                $message->from('contactaobongda@gmail.com', 'Áo bóng đá');
                $message->to($user->email,$user->name)->subject('Thông báo xóa tài khoản');
            });
            $delete = $user->delete();
            return redirect()->route('admin.listuser');
        }else{
            $data = [];

            Mail::send('frontend.email.maildeletesubadmin', $data, function ($message) use($user) {
                $message->from('contactaobongda@gmail.com', 'Áo bóng đá');
                $message->to($user->email,$user->name)->subject('Thông báo xóa tài khoản');
            });
            $deletepermission = user_has_permissions::where('id_user',$id)->delete();
            $delete = $user->delete();
            return redirect()->route('admin.listsubadmin');
        }
    }

    public function listsubadmin(){
        $listuser = user::where('id_role',2)->get();
        return view('admin.account.listsubadmin',compact('listuser'));
    }

    public function addsubadmin(){
        $permissions = permissions::all();
        return view('admin.account.addsubadmin',compact('permissions'));
    }

    public function postaddsubadmin(Request $request){
        //Tạo tài khoản
        $maxid = user::max('id');
        $password = str::random(8);
        $db = new user();
        $db->id = $maxid + 1;
        $db->username = $request->username;
        $db->password = bcrypt($password);
        $db->fullname = $request->fullname;
        $db->id_role = 2;
        $db->email = $request->email;
        $db->phone = $request->phone;
        $db->save();

        //Gửi email
        Mail::send('frontend.email.mailcreatesubadmin', array('password' => $password,'username'=>$request->username), function ($message) use($request) {
            $message->from('contactaobongda@gmail.com', 'Áo bóng đá');
            $message->to($request->email,$request->fullname)->subject('Thông báo tài khoản subadmin');
        });

        //Thêm quyền
        foreach($request->permissions as $item){
            $dbper = new user_has_permissions();
            $dbper->id_user = $maxid + 1;
            $dbper->id_permission = $item;
            $dbper->save(); 
        }
        return redirect()->route('admin.listsubadmin');
    }

    public function editsubadmin($id){
        $permissions = permissions::all();
        $user = user::find($id);
        return view('admin.account.editsubadmin',compact('permissions','user'));
    }

    public function posteditsubadmin(Request $request){
        $deletepermission = user_has_permissions::where('id_user',$request->id)->delete();
        //Thêm quyền
        if(!empty($request->permissions)){
            foreach($request->permissions as $item){
                $dbper = new user_has_permissions();
                $dbper->id_user = $request->id;
                $dbper->id_permission = $item;
                $dbper->save(); 
            }
        }else{
            return redirect()->back();
        }
        return redirect()->route('admin.listsubadmin');
    }

    public function editmyaccount($id){
        $user = user::find($id);
        return view('admin.account.editmyaccount',compact('user'));
    }

    public function posteditmyaccount(Request $request){
        
    }

    public function postchangepassword(Request $request){
        $user = user::find($request->id);
        if(Hash::check($request->oldpassword, $user->password)){
            $update = $user->update([
                'password' => bcrypt($request->newpassword)
            ]);
            return redirect()->route('admin.editmyaccount');
        }else{
            return redirect()->back();
        }
    }

    public function listcomment(){
        $listcomment = comment_news::all();
        return view('admin.account.listcomment',compact('listcomment'));
    }

    public function deletecomment($id){
        $listcomment = comment_news::find($id)->delete();
        return redirect()->route('admin.listcomment');
    }
}
