<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class register extends FormRequest
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
            'username' => 'required|min:5|max:100|unique:users,username',
            'fullname' => 'required|min:5|max:100',
            'email' => 'required|min:5|max:100|email|unique:users,email',
            'password' => 'required|min:8|max:30',
            'repassword' => 'required|same:password',
        ];
    }

    public function messages()
    {
        return [
            'username.required' => 'Tài khoản không được để trống',
            'username.min' => 'Tài khoản không được ít hơn 5 kí tự',
            'username.unique' => 'Tài khoản đã tồn tại vui lòng chọn tên khác',
            'username.max' => 'Tài khoản không được nhiều hơn 100 kí tự',
            'fullname.required' => 'Tên không được để trống',
            'fullname.min' => 'Tên không được ít hơn 5 kí tự',
            'fullname.max' => 'Tên không được nhiều hơn 100 kí tự',
            'email.required' => 'Email không được để trống',
            'email.email' => 'Email không đúng định dạng',
            'email.min' => 'Email không ít hơn 5 kí tự',
            'email.max' => 'Email không quá 100 kí tự',
            'email.unique' => 'Email đã được đăng kí bởi tài khoản khác',
            'password.required' => 'Mật khẩu không được để trống',           
            'password.min' => 'Mật khẩu không ít hơn 8 kí tự',
            'password.max' => 'Mật khẩu không quá 30 kí tự',
            'repassword.required' => 'Nhập lại mật khẩu không được để trống',
            'repassword.same' => 'Mật khẩu nhập lại phải trùng với ô mật khẩu'
        ];
    }
}
