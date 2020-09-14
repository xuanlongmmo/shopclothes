<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Mail;

use App\contact;

class ContactController extends Controller
{
    public function getcontact(){
        $list_contact = contact::orderBy('created_at', 'DESC')->get();
        return view('admin.contact.index',compact('list_contact'));
    }

    public function getrefcontact($id){
        $infor = contact::where('id',$id)->firstOrFail();
        return view('admin.contact.refcontact',compact('infor'));
    }
    public function postrefcontact(Request $request){
        Mail::raw($request->content_ref, function($message) use($request){
            $message->from('contactaobongda@gmail.com', 'Áo bóng đá');
            $message->to($request->email,$request->name)->subject('Mail trả lời');
        });

        $update = contact::where('id',$request->id)->update([
            'status' => 1 
        ]);
        
        return redirect()->route('admin.contact');
    }
}
