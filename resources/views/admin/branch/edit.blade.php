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
    <h3>Sửa chi nhánh</h3>
</div>
<div>
    <form method="POST" action="{{ route('admin.posteditbranch') }}">
        @csrf
        <input style="display: none" type="text" name="id" value="{{ $branch->id }}">
        <label for="">Tên chi nhánh</label>
        <input type="text" name="branch_name" value="{{ $branch->branch_name }}">
        <label for="">Email</label>
        <input type="text" name="email" value="{{ $branch->email }}">
        <label for="">Số điện thoại</label>
        <input type="text" name="phone" value="{{ $branch->phone }}">
        <label for="">Địa chỉ</label>
        <input type="text" name="address" value="{{ $branch->address }}">
        <label for="">Facebook</label>
        <input type="text" name="facebook" value="{{ $branch->facebook }}">
        <label for="">Twitter</label>
        <input type="text" name="twitter" value="{{ $branch->twitter }}">
        <label for="">Instagram</label>
        <input type="text" name="instagram" value="{{ $branch->instagram }}">
        <label for="">Youtube</label>
        <input type="text" name="youtube" value="{{ $branch->youtube }}">
        @if ($branch->id==1)
            <label for="">Tên ngân hàng</label>
            <input type="text" name="bank_name" value="{{ $branch->bank_name }}">
            <label for="">Số tài khoản</label>
            <input type="text" name="bank_number" value="{{ $branch->bank_number }}">
            <label for="">Tên công ty thụ hưởng</label>
            <input type="text" name="name_company" value="{{ $branch->name_company }}">
        @endif
        <br><br>
        <button style="margin-bottom: 50px;width: 400px;background: #3598dc"><span style="color: black">Sửa</span></button>
    </form>
</div>
@endsection