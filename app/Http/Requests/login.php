<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class login extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'username' => 'required|min:5|max:100',
            'password' => 'required|min:8|max:30',
        ];
    }

    public function messages(){
        return [
            'username.required' => 'Tài khoản không được để trống',
            'username.min' => 'Tài khoản không được ít hơn 5 kí tự',
            'username.max' => 'Tài khoản không được nhiều hơn 100 kí tự',
            'password.required' => 'Mật khẩu không được để trống',           
            'password.min' => 'Mật khẩu không ít hơn 8 kí tự',
            'password.max' => 'Mật khẩu không quá 30 kí tự',
        ];
    }
}
