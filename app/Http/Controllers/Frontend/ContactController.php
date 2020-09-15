<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Mail;

//Gọi model
use App\contact;

use App\Http\Requests\postcontact;

class ContactController extends Controller
{
    //Liên hệ
    public function contact(){
        return view('frontend.contact.index');
    }

    public function postcontact(postcontact $request){
        $save = contact::create($request->all());
        
        $data = [
            'name' => $request->name,
        ];

        Mail::send('frontend.email.mailcontact', $data, function ($message) use($request) {
            $message->from('contactaobongda@gmail.com', 'Áo bóng đá');
            $message->to($request->email,$request->name)->subject('Mail xác nhận thông tin');
        });
        
        return redirect()->back();
    }
}
