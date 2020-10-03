<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class editproduct extends FormRequest
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
            'product_name'=>'required|min:5|max:1000',
            'large_category'=>'required',
            'price'=>'required|numeric|min:0|max:100000000',
            'sale'=>'required|numeric|min:0|max:100',
            'status'=>'required',
            'editor1'=>'required',
        ];
    }
    public function messages()
    {
        return [
            'product_name.required'=>'Tên sản phẩm không được để trống',
            'product_name.min'=>'Tên sản phẩm không được ít hơn 5 kí tự',
            'product_name.max'=>'Tên sản phẩm không được dài hơn 1000 kí tự',
            'large_category.required'=>'Phải chọn danh mục cho sản phẩm',
            'price.required'=>'Phải nhập giá cho sản phẩm',
            'price.numeric'=>'Giá sản phẩm phải là số',
            'price.min'=>'Giá sản phẩm không được bé hơn 0 đ',
            'price.max'=>'Giá sản phẩm không được lớn hơn 100.000.000 đ',
            'sale.required'=>'Phải nhập % sale cho sản phẩm',
            'sale.numeric'=>'Giảm giá sản phẩm phải là số',
            'sale.min'=>'Giảm giá sản phẩm không được bé hơn 0%',
            'sale.max'=>'Giảm giá sản phẩm không được lớn hơn 100%',
            'status.required'=>'Phải chọn trạng thái',
            'editor1.required'=>'Mô tả sản phẩm không được để trống',
        ];
    }
}
