<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class categorynews extends FormRequest
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
            'category_name'=>'required|min:5|max:100',
            'status'=>'required',
        ];
    }
    public function messages()
    {
        return [
            'category_name.required'=>'Tên danh mục không được để trống',
            'category_name.min'=>'Tên danh mục không được ít hơn 5 kí tự',
            'category_name.max'=>'Tên danh mục không được dài hơn 100 kí tự',
            'status.required'=>'Phải chọn trạng thái',
        ];
    }
}
