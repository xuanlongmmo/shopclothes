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
    <h3>Thêm sản phẩm mới</h3>
</div>
<div style="margin-left: 30px" class="form">
    <form method="POST" enctype="multipart/form-data" action="{{ route('admin.postaddproduct') }}">
        @csrf
        <label for="">Tên sản phẩm</label>
        <input type="text" name="product_name" placeholder="Nhập tên sản phẩm"><br>
        <span style="color: red">{{ $errors->first('product_name') }}</span><br>
        <label for="">Danh mục lớn</label>
        <select class="a" name="large_category">
            {{--  <optgroup label="Swedish Cars">  --}}
            @foreach ($large_category as $item)
                <option value="{{ $item->id }}">{{ $item->id }} - {{ $item->category_name }}</option>
            @endforeach
        </select><br>
        <span style="color: red">{{ $errors->first('large_category') }}</span><br>
        <label for="">Danh mục nhỏ <span style="color: red">(Có thể không chọn)</span></label>
        <select class="a" name="small_category">
            <option value="0">Không có</option>
            @foreach ($small_category as $item)
                <option value="{{ $item->id }}">{{ $item->id }} - {{ $item->category_name }}</option>
            @endforeach
        </select><br>
        <label for="">Giá</label>
        <input type="text" name="price" placeholder="Nhập giá"><br>
        <span style="color: red">{{ $errors->first('price') }}</span><br>
        <label for="">Giảm giá</label>
        <input type="text" name="sale" placeholder="Nhập giảm giá"><br>
        <span style="color: red">{{ $errors->first('sale') }}</span><br>
        <label for="">Ảnh mô tả</label>
        <input style="border: none" type="file" name="image" />
        <span style="color: red">{{ $errors->first('image') }}</span><br>
        <label for="">Ảnh sản phẩm (Có thể chọn được nhiều ảnh)</label>
        <input multiple='multiple' style="border: none" type="file" name="images[]" />
        <span style="color: red">{{ $errors->first('images') }}</span><br>
        <label for="">Trạng thái</label>
        <input class="check" type="radio" name="status" value="1"><span style="font-size: 15px">  Hiển thị</span>
        <div></div>
        <input class="check" type="radio" name="status" value="0"><span style="font-size: 15px">  Ẩn</span>
        <br><span style="color: red">{{ $errors->first('status') }}</span><br>
        <label for="">Mô tả</label>
        <textarea name="editor1"></textarea>
        <span style="color: red">{{ $errors->first('editor1') }}</span><br>
        <br><br>
        <button style="margin-bottom: 50px;width: 400px;background: #3598dc"><span style="color: black">Thêm</span></button>
    </form>
</div>
@endsection
