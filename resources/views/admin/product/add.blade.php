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
</style>
@section('content')
<div class="page-title">
    <h3>Thêm tin mới</h3>
</div>
<div style="margin-left: 30px" class="form">
    <form method="POST" enctype="multipart/form-data" action="{{ route('admin.postaddproduct') }}">
        @csrf
        {{--  <label for="">Danh mục</label>
        <select class="a" name="category">
            @foreach ($categories as $item)
                <option value="{{ $item->id }}">{{ $item->id }} - {{ $item->category_name }}</option>
            @endforeach
        </select><br>
        <label for="">Tiêu đề</label>
        <input type="text" name="title"><br>  --}}
        <label for="">Ảnh sản phẩm</label>
        <input multiple style="border: none" type="file" name="image[]" />
        {{--  <label for="">Nội dung</label>
        <textarea name="editor1"></textarea>  --}}
        <br><br>
        <button style="margin-bottom: 50px;width: 400px;background: #3598dc"><span style="color: black">Thêm</span></button>
    </form>
</div>
@endsection
