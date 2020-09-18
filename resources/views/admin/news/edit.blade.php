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
    <h3>Sửa tin</h3>
</div>
<div style="margin-left: 30px" class="form">
    <form method="POST" enctype="multipart/form-data" action="{{ route('admin.posteditnews') }}">
        @csrf
        <input style="display: none" value="{{ $news->id }}" type="text" name="id">
        <label for="">Danh mục</label>
        <select class="a" name="category">
            @foreach ($categories as $item)
                @if ($item->id == $news->id_category)
                   <option selected value="{{ $item->id }}">{{ $item->id }} - {{ $item->category_name }}</option>  
                @else
                   <option value="{{ $item->id }}">{{ $item->id }} - {{ $item->category_name }}</option>
                @endif
            @endforeach
        </select><br>
        <label for="">Tiêu đề</label>
        <input value="{{ $news->title }}" type="text" name="title"><br>
        <label for="">Trạng thái</label>
        @if ($news->status == 1)
            <input class="check" checked type="radio" name="status" value="1"><span style="font-size: 15px">  Hiển thị</span>
            <div></div>
            <input class="check" type="radio" name="status" value="2"><span style="font-size: 15px">  Ẩn</span><br>
        @else
            <input class="check" type="radio" name="status" value="1"><span style="font-size: 15px">  Hiển thị</span>
            <div></div>
            <input class="check" checked type="radio" name="status" value="2"><span style="font-size: 15px">  Ẩn</span><br>
        @endif
        <label for="">Ảnh tiêu đề</label>
        <img src="{{ $news->link_image }}" alt="">
        <input style="border: none" type="file" name="image">
        <label for="">Nội dung</label>
        <textarea cols="30" rows="100" name="editor1">{!! html_entity_decode($news->content) !!}</textarea>
        <br><br>
        <button style="margin-bottom: 50px;width: 400px;background: #3598dc"><span style="color: black">Lưu</span></button>
    </form>
</div>
@endsection
