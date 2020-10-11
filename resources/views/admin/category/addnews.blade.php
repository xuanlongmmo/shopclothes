@extends('admin.layout.master')
<style>
    select.a{
        width: 400px;
        height: 30px;
    }
    input{
        width: 400px;
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
    <h3>Thêm danh mục tin tức mới</h3>
</div>
<div style="margin-left: 30px" class="form">
    <form method="POST" enctype="multipart/form-data" action="{{ route('admin.postaddcategorynews') }}">
        @csrf
        <label for="">Tên danh mục</label>
        <input type="text" name="category_name"><br>
        <span style="color: red">{{ $errors->first('category_name') }}</span><br>
        <label for="">Trạng thái</label>
        <input class="check" type="radio" name="status" value="1"><span style="font-size: 15px">  Hiển thị</span>
        <div></div>
        <input class="check" type="radio" name="status" value="2"><span style="font-size: 15px">  Ẩn</span>
        <br><span style="color: red">{{ $errors->first('status') }}</span>
        <br><br>
        <button style="margin-bottom: 50px;width: 400px;background: #3598dc"><span style="color: black">Thêm</span></button>
    </form>
</div>
@endsection