<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class updateprofile extends FormRequest
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
            'name' => 'required|min:10|max:100',
            'phone' => 'required|numeric|min:10',
            'address' => 'required|min:20|max:500',
            'image' => 'mimes:jpeg,jpg,png'
        ];
    }

    public function messages()
    {
        return [
            'image.mimes' => 'Ảnh phải có định dạng là jpg,jpge,png',
            'name.required' => 'Tên không được để trống',
            'name.min' => 'Tên không được ít hơn 10 kí tự',
            'name.max' => 'Tên không được nhiều hơn 100 kí tự',
            'phone.required' => 'Số điện thoại không được để trống',
            'phone.numeric' => 'Số điện thoại không đúng định dạng',
            'phone.min' => 'Số điện thoại phải ít nhất 10 số',
            'address.required' => 'Địa chỉ không được để trống',
            'address.min' => 'Địa chỉ không được ít hơn 20 kí tự',
            'address.max' => 'Địa chỉ không được nhiều hơn 500 kí tự',
        ];
    }
}
