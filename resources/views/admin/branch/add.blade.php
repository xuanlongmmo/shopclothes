@extends('admin.layout.master')
<style>
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
    <h3>Thêm chi nhánh</h3>
</div>
<div>
    <form method="POST" action="{{ route('admin.postaddbranch') }}">
        @csrf
        <label for="">Tên chi nhánh</label>
        <input type="text" name="branch_name">
        <label for="">Email</label>
        <input type="text" name="email">
        <label for="">Số điện thoại</label>
        <input type="text" name="phone">
        <label for="">Địa chỉ</label>
        <input type="text" name="address">
        <label for="">Facebook</label>
        <input type="text" name="facebook">
        <label for="">Twitter</label>
        <input type="text" name="twitter">
        <label for="">Instagram</label>
        <input type="text" name="instagram">
        <label for="">Youtube</label>
        <input type="text" name="youtube"><br><br>
        <button style="margin-bottom: 50px;width: 400px;background: #3598dc"><span style="color: black">Thêm</span></button>
    </form>
</div>
@endsection