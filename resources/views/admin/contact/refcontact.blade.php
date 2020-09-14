@extends('admin.layout.master')
@section('content')
{{--  <div class="page-title">
    <h3>Trả lời</h3>
</div>  --}}
<style>
    .aaa span{
        font-size: 20px;
    }
</style>
    <div class="aaa" style="margin-left: 50px;margin-top: 20px">
        <div><span><b>Họ tên: </b>{{ $infor->name }}</span></div>
        <div><span><b>Email: </b>{{ $infor->email }}</span></div>
        <div><span><b>Số điện thoại: </b>{{ $infor->phone }}</span></div>
        <div><span><b>Tiêu đề: </b>{{ $infor->title }}</span></div>
        <div><span><b>Nội dung: </b>{{ $infor->content }}</span></div>
        <form action="{{ route('admin.postrefcontact') }}" method="POST">
            @csrf
            <input style="display: none" type="text" name="id" value="{{ $infor->id }}">
            <input style="display: none" type="text" name="email" value="{{ $infor->email }}">
            <input style="display: none" type="text" name="name" value="{{ $infor->name }}">
            <textarea style="margin-top: 10px" name="content_ref" id="" cols="100" rows="10" required></textarea><br>
            <button style="margin-top: 15px;background-color: #3598dc;color: black;font-size: 18px;width: 100px;height: 30px;border: none">Trả lời</button>
        </form>
    </div>
@endsection