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
    <h3>Sửa danh mục</h3>
</div>
<div style="margin-left: 30px" class="form">
    <form method="POST" enctype="multipart/form-data" action="{{ route('admin.posteditcategory') }}">
        @csrf
        <input style="display: none" type="text" name="id" value="{{ $data->id }}">
        <label for="">Tên danh mục</label>
        <input type="text" value="{{ $data->category_name }}" name="category_name"><br>
        <span style="color: red">{{ $errors->first('category_name') }}</span><br>
        <label for="">Slug</label>
        <input type="text" value="{{ $data->slug_name }}" name="slug_name"><br>
        <span style="color: red">{{ $errors->first('slug_name') }}</span><br>
        <label for="">Loại danh mục</label>
        @if ($data->id_parent == 0)
            <input class="check" checked type="radio" name="type" value="1"><span style="font-size: 15px">  Danh mục lớn</span>
            <div></div>
            <input class="check" type="radio" name="type" value="2"><span style="font-size: 15px">  Danh mục nhỏ</span>
            <br><span style="color: red">{{ $errors->first('type') }}</span><br>
            <label for="">Danh mục lớn <span style="color: red">(Nếu danh mục lớn thì không cần chọn mục này)</span></label>
            <select class="a" name="category">
                @foreach ($large_category as $item)
                    <option value="{{ $item->id }}">{{ $item->id }} - {{ $item->category_name }}</option>
                @endforeach
            </select><br>
        @else
            <input class="check" type="radio" name="type" value="1"><span style="font-size: 15px">  Danh mục lớn</span>
            <div></div>
            <input class="check" checked type="radio" name="type" value="2"><span style="font-size: 15px">  Danh mục nhỏ</span> 
            <br><span style="color: red">{{ $errors->first('type') }}</span><br>
            <label for="">Danh mục lớn <span style="color: red">(Nếu danh mục lớn thì không cần chọn mục này)</span></label>
            <select class="a" name="category">
                @foreach ($large_category as $item)
                    @if ($item->id == $data->id_parent)
                        <option selected value="{{ $item->id }}">{{ $item->id }} - {{ $item->category_name }}</option>
                    @else
                        <option value="{{ $item->id }}">{{ $item->id }} - {{ $item->category_name }}</option>
                    @endif
                @endforeach
            </select><br>
        @endif
        <label for="">Trạng thái</label>
        @if ($data->status == 1)
            <input class="check" checked type="radio" name="status" value="1"><span style="font-size: 15px"> Hiển thị</span>
            <div></div>
            <input class="check" type="radio" name="status" value="2"><span style="font-size: 15px">  Ẩn</span>
        @else
            <input class="check" type="radio" name="status" value="1"><span style="font-size: 15px">  Hiển thị</span>
            <div></div>
            <input class="check" checked type="radio" name="status" value="2"><span style="font-size: 15px">  Ẩn</span>
        @endif
        <br><br>
        <button style="margin-bottom: 50px;width: 400px;background: #3598dc"><span style="color: black">Sửa</span></button>
    </form>
</div>
@endsection