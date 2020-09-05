<?php

namespace App\Http\Controllers\Auth;

use Carbon\Carbon;
use Illuminate\Support\Str;
use App\user;
use Mail;
use Illuminate\Http\Request;
use App\password_resets;
use App\Notifications\ResetPasswordRequest;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class ResetPasswordController extends Controller
{
    /**
     * Create token password reset.
     *
     * @param  ResetPasswordRequest $request
     * @return JsonResponse
     */

    public function sendMail(Request $request)
    {
        $user = User::where('email', $request->email)->first();

        if($user!=null){
            $passwordReset = password_resets::updateOrCreate([
                'email' => $user->email,
            ], [
                'token' => Str::random(60),
            ]);

            $db = new password_resets;
            $token = $db->where('email',$user->email)->get();
            $url = url('resetpassword/?token=' . $token[0]->token);
            $content = 'Để thiết lập lại mật khẩu bạn vui lòng truy cập vào link sau: '.$url;
            Mail::raw($content, function($message) use($request)
            {
                $message->from('contactaobongda@gmail.com', 'Áo bóng đá');
                $message->to($request->email,'User')->subject('Quên mật khẩu');
            });
            return view('frontend.notification.notification')->withSuccess('Chúng tôi đã gửi link lấy lại mật khẩu của bạn qua mail, bạn vui lòng kiểm tra mail.');
        }else{
            return view('frontend.account.resetpassword')->with('fail', 'Không tìm thấy email '.$request->email.' trong hệ thống vui lòng kiểm tra lại!');
        }

    }

    public function reset()
    {
        $token = $_GET['token'];
        $passwordReset = password_resets::where('token', $token)->firstOrFail();
        if (Carbon::parse($passwordReset->updated_at)->addMinutes(720)->isPast()) {
            $passwordReset->delete();

            return view('frontend.notification.notification')->withSuccess('Link đã hết hiệu lực!');
        }else{
            $email = $passwordReset->email;
            return view('frontend.account.resetpassword2',compact('email'));
        }

        // return response()->json([
        //     'success' => $updatePasswordUser,
        // ]);
    }

    public function sendpass(Request $request){
        // dd($request->toArray());
        $passwordReset = password_resets::where('email', $request->email)->firstOrFail();
        $user = User::where('email', $request->email)->firstOrFail();
        $updatePasswordUser = $user->update([
            'password' => bcrypt($request->password)
        ]);
        $passwordReset->delete();
        return view('frontend.notification.notification')->withSuccess('Đổi mật khẩu thành công!');
    }
}