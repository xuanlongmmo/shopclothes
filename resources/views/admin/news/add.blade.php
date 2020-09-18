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
    <h3>Thêm tin mới</h3>
</div>
<div style="margin-left: 30px" class="form">
    <form method="POST" enctype="multipart/form-data" action="{{ route('admin.postaddnews') }}">
        @csrf
        <label for="">Danh mục</label>
        <select class="a" name="category">
            @foreach ($categories as $item)
                <option value="{{ $item->id }}">{{ $item->id }} - {{ $item->category_name }}</option>
            @endforeach
        </select><br>
        <label for="">Tiêu đề</label>
        <input type="text" name="title"><br>
        <span style="color: red">{{ $errors->first('title') }}</span><br>
        <label for="">Trạng thái</label>
        <input class="check" type="radio" name="status" value="1"><span style="font-size: 15px">  Hiển thị</span>
        <div></div>
        <input class="check" type="radio" name="status" value="2"><span style="font-size: 15px">  Ẩn</span><br>
        <span style="color: red">{{ $errors->first('status') }}</span><br>
        <label for="">Ảnh tiêu đề</label>
        <input style="border: none" type="file" name="image">
        <span style="color: red">{{ $errors->first('image') }}</span><br>
        <label for="">Nội dung</label>
        <textarea name="editor1"></textarea>
        <span style="color: red">{{ $errors->first('editor1') }}</span><br>
        <br><br>
        <button style="margin-bottom: 50px;width: 400px;background: #3598dc"><span style="color: black">Thêm</span></button>
    </form>
</div>
@endsection
