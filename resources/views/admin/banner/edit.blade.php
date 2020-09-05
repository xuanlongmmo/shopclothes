@extends('admin.layout.master')
<style>
    input{
        width: 400px;
        height: 30px;
    }
    label{
        color: red;
        margin: 15px 0px;
    }
</style>
@section('content')
<div class="page-title">
    <h3>Sửa banner</h3>
</div>
<div>
    <form method="POST" action="{{ route('admin.posteditbanner') }}">
        @csrf
        <input style="display: none" type="text" name="id" value="{{ $banner->id }}">
        <label for="">Tiêu đề</label>
        <input type="text" name="title" value="{{ $banner->title }}">
        <label for="">Thông tin (giảm giá,...)</label>
        <input type="text" name="infor" value="{{ $banner->infor }}">
        <label for="">Link sự kiện</label>
        <input type="text" name="link" value="{{ $banner->link }}">
        <label for="">Link ảnh</label>
        <input type="text" name="link_image" value="{{ $banner->link_image }}">
        <label for="">Mô tả</label>
        <textarea name="description" id="" cols="51" rows="10">{{ $banner->description }}</textarea>
        <br><br>
        <button style="margin-bottom: 50px;width: 400px;background: #3598dc"><span style="color: black">Sửa</span></button>
    </form>
</div>
@endsection