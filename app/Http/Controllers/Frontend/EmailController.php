<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\list_email_subcribe;

class EmailController extends Controller
{
    public function subrice_email(Request $request){
        if($request->email != null){
            $db = list_email_subcribe::updateOrCreate([
                'email' => $request->email
            ]);
            return redirect()->back();
        }
    }
}
