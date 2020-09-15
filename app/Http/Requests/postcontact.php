<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class postcontact extends FormRequest
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
            'name' => 'required|min:5|max:100',
            'email' => 'required|email',
            'title' => 'required|min:5|max:10000',
            'phone' => 'required|numeric',
            'content' => 'required|min:10'
        ];
    }

    public function messages(){
        return [
            'name.required' => 'Họ tên không được để trống',
            'name.min' => 'Họ tên không được ít hơn 5 kí tự',
            'name.max' => 'Họ tên không được nhiều hơn 100 kí tự',
            'email.required' => 'Email không được để trống',           
            'email.email' => 'Email không đúng định dạng',
            'title.required' => 'Tiêu đề không được để trống',
            'title.min' => 'Tiêu đề không được ít hơn 5 kí tự',
            'title.max' => 'Tiêu đề không được nhiều hơn 10000 kí tự',
            'phone.required' => 'Số điện thoại không được để trống',
            'phone.numeric' => 'Số điện thoại không đúng định dạng',
            'content.required' => 'Nội dung không được để trống',
            'content.min' => 'Nội dung không được ít hơn 10 kí tự',
        ];
    }
}
