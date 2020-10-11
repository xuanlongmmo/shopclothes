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
    <h3>Thêm mã giảm giá mới</h3>
</div>
<div style="margin-left: 200px" class="form">
    <form method="POST" enctype="multipart/form-data" action="{{ route('admin.postaddcategory') }}">
        @csrf
        <label for="">Mã code</label>
        <input style="text-transform: uppercase" id="code" type="text" name="code"><br>
        <span style="color: red">{{ $errors->first('code') }}</span>
        <label for="">Điều kiện</label>
        <input type="text" name="condition"><br>
        <span style="color: red">{{ $errors->first('condition') }}</span><br>
        <label for="">Ngày hết hạn</label>
        <input type="datetime-local" name="type"><br><br>
        <button style="margin-bottom: 50px;width: 400px;background: #3598dc"><span style="color: black">Thêm</span></button>
    </form>
    <button style="z-index: 2;margin-top: -325px;margin-left: 80px" id="ok" onClick="clickkk()">Random</button>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
    function clickkk(){
        var obj = document.getElementById('code');
        obj.value = Math.random().toString(36).substring(2,8);
        event.preventDefault();
    }
</script>
@endsection