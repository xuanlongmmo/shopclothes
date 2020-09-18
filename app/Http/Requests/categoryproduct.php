<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class categoryproduct extends FormRequest
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
            'slug_name'=>'required|min:3|max:100|unique:category_product,slug_name',
            'type'=>'required',
            'status'=>'required',
        ];
    }
    public function messages()
    {
        return [
            'category_name.required'=>'Tên danh mục không được để trống',
            'category_name.min'=>'Tên danh mục không được ít hơn 5 kí tự',
            'category_name.max'=>'Tên danh mục không được dài hơn 100 kí tự',
            'slug_name.required'=>'Slug không được để trống',
            'slug_name.unique'=>'Slug này đã có trong cơ sở dữ liệu vui lòng điền slug khác',
            'slug_name.min'=>'Slug không được ít hơn 3 kí tự',
            'slug_name.max'=>'Slug không được dài hơn 100 kí tự',
            'type.required'=>'Phải chọn loại danh mục',
            'status.required'=>'Phải chọn trạng thái',
        ];
    }
}
