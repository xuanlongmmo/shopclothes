@extends('admin.layout.master')
<style>
    select.a{
        width: 700px;
        height: 30px;
    }
    input{
        width: 700px;
        height: 30px;
    }
    label{
        color: black;
        margin: 10px 0px;
    }
    input.check{
        width: 12px;
        height: 12px;
    }
</style>
@section('content')
<div class="page-title">
    <h3>Sửa sản phẩm</h3>
</div>
<div style="margin-left: 30px" class="form">
    <form method="POST" enctype="multipart/form-data" action="{{ route('admin.posteditproduct') }}">
        @csrf
        <input value="{{ $data->id }}" type="text" name="id" style="display: none">
        <label for="">Tên sản phẩm</label>
        <input type="text" name="product_name" placeholder="Nhập tên sản phẩm" value="{{ $data->product_name }}"><br>
        <span style="color: red">{{ $errors->first('product_name') }}</span><br>
        <label for="">Danh mục lớn</label>
        <select class="a" name="large_category">
            @foreach ($large_category as $item)
                @if ($data->large_category == $item->id)
                    <option selected value="{{ $item->id }}">{{ $item->id }} - {{ $item->category_name }}</option>
                @else
                    <option value="{{ $item->id }}">{{ $item->id }} - {{ $item->category_name }}</option>
                @endif
            @endforeach
        </select><br>
        <span style="color: red">{{ $errors->first('large_category') }}</span><br>
        <label for="">Danh mục nhỏ <span style="color: red">(Có thể không chọn)</span></label>
        <select class="a" name="small_category">
            @foreach ($small_category as $item)
                @if ($data->small_category == $item->id)
                    <option selected value="{{ $item->id }}">{{ $item->id }} - {{ $item->category_name }}</option>
                @else
                    <option value="{{ $item->id }}">{{ $item->id }} - {{ $item->category_name }}</option>
                @endif
            @endforeach
        </select><br>
        <label for="">Giá</label>
        <input type="text" name="price" value="{{ $data->price }}" placeholder="Nhập giá"><br>
        <span style="color: red">{{ $errors->first('price') }}</span><br>
        <label for="">Giảm giá</label>
        <input type="text" name="sale" value="{{ $data->sale_percent }}" placeholder="Nhập giảm giá"><br>
        <span style="color: red">{{ $errors->first('sale') }}</span><br>
        <label for="">Ảnh mô tả</label>
        <input style="border: none" type="file" name="image" />
        <div class="preview"> 
            <img id="thumb" width="100px" height="100px" src="{{ $data->link_image }}" /> 
        </div>
        <span style="color: red">{{ $errors->first('image') }}</span><br>
        <label for="">Ảnh sản phẩm (Có thể chọn được nhiều ảnh)</label>
        <input multiple='multiple' style="border: none" type="file" name="images[]" />
        <div class="preview"> 
           @foreach ($data->image_product as $item)
            <img id="thumb" width="100px" height="100px" src="{{ $item->image }}" />
           @endforeach 
        </div>
        <span style="color: red">{{ $errors->first('images') }}</span><br>
        <label for="">Trạng thái</label>
        @if ($data->status==0)
            <input class="check" type="radio" name="status" value="1"><span style="font-size: 15px">  Hiển thị</span>
            <div></div>
            <input class="check" checked type="radio" name="status" value="0"><span style="font-size: 15px">  Ẩn</span>
        @else
            <input class="check" checked type="radio" name="status" value="1"><span style="font-size: 15px">  Hiển thị</span>
            <div></div>
            <input class="check" type="radio" name="status" value="0"><span style="font-size: 15px">  Ẩn</span>
        @endif
        <br><span style="color: red">{{ $errors->first('status') }}</span><br>
        <label for="">Mô tả</label>
        <textarea name="editor1">{{ html_entity_decode($data->description) }}</textarea>
        <span style="color: red">{{ $errors->first('editor1') }}</span><br>
        <br><br>
        <button style="margin-bottom: 50px;width: 400px;background: #3598dc"><span style="color: black">Thêm</span></button>
    </form>
</div>
@endsection
