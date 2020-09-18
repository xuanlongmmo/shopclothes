<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class addnews extends FormRequest
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
            'title' => 'required|min:5|max:1000',
            'image' => 'required|mimes:jpeg,jpg,png|max:5120',
            'editor1' => 'required',
            'status' => 'required',
        ];
    }

    public function messages(){
        return [
            'title.required' => 'Tiêu đề không được để trống',
            'title.min' => 'Tiêu đề không được ít hơn 5 kí tự',
            'title.max' => 'Tiêu đề không được nhiều hơn 1000 kí tự',
            'image.required' => 'Ảnh không được để trống', 
            'image.mimes' => 'Ảnh phải có định dạng là jpg,jpge,png',
            'image.max' => 'Ảnh không được vượt quá 5Mb',
            'editor1.required' => 'Nội dung không được để trống',
            'status.required' => 'Trạng thái không được để trống',
        ];
    }
}
