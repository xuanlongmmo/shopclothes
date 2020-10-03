@extends('admin.layout.master')
<style>
    select.a{
        width: 400px;
        height: 30px;
    }
    input{
        width: 700px;
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
    {box-sizing: border-box;}

    /* Button used to open the contact form - fixed at the bottom of the page */
    .open-button {
    background-color: #555;
    color: white;
    padding: 16px 20px;
    border: none;
    cursor: pointer;
    opacity: 0.8;
    position: fixed;
    bottom: 23px;
    right: 28px;
    width: 280px;
    }

    /* The popup form - hidden by default */
    .form-popup { 
    width: 500px;
    height: 500px;
    display: none;
    position: fixed;
    top: 100;
    right: 305px;
    border: 2px solid green;
    }

    /* Add styles to the form container */
    .form-container {
    max-width: 500px;
    padding: 10px;
    background-color: white;
    }

    /* Full-width input fields */
    .form-container input[type=text], .form-container input[type=password] {
    width: 100%;
    padding: 15px;
    margin: 5px 0 22px 0;
    border: none;
    background: #f1f1f1;
    }

    /* When the inputs get focus, do something */
    .form-container input[type=text]:focus, .form-container input[type=password]:focus {
    background-color: #ddd;
    outline: none;
    }

    /* Set a style for the submit/login button */
    .form-container .btn {
    background-color: #4CAF50;
    color: white;
    padding: 16px 20px;
    border: none;
    cursor: pointer;
    width: 100%;
    margin-bottom:10px;
    opacity: 0.8;
    }

    /* Add some hover effects to buttons */
    .form-container .btn:hover, .open-button:hover {
    opacity: 1;
    }
</style>
@section('content')
<div class="page-title">
    <h3></h3>
</div>
<div  style="background-color: transparent;width: 800px;margin: 0px 100px;">
    <div style="background-color: transparent;" class="modal-body">
        <form method="POST" class="aa-login-form" action="{{ route('admin.posteditmyaccount') }}">
          @csrf
          <input type="text" style="display: none" value="{{ $user->id }}" name="id">
          <label for="">Tài khoản</label>
          <input readonly value="{{ $user->username }}" name="username" type="text" placeholder="Tài khoản"><br>
          <span style="color: red">{{ $errors->first('username') }}</span><br>
          <label for="">Họ và Tên</label>
          <input readonly value="{{ $user->fullname }}" name="fullname" type="text" placeholder="Họ và Tên"><br>
          <span style="color: red">{{ $errors->first('fullname') }}</span><br>
          <label  for="">Email</label>
          <input readonly value="{{ $user->email }}" name="email" type="text" placeholder="Email"><br>
          <span style="color: red">{{ $errors->first('email') }}</span><br>
          <label for="">Số điện thoại<span>*</span></label>
          <input value="{{ $user->phone }}" name="phone" type="text" placeholder="Số điện thoại"><br>
          <span style="color: red">{{ $errors->first('phone') }}</span><br>
          <input style="width: 150px;margin-top: 10px;margin-left: 300px;background-color: chartreuse" type="submit" value="Lưu" >
          </div>
        </form>
    </div> 
    <button class="open-button" onclick="openForm()">Đổi mật khẩu</button>
    <div class="form-popup" id="myForm">
        <button style="background-color: transparent;border: none;margin-left: 455px" class="" onclick="closeForm()"><i style="color: red;font-size: 20px" class="fa fa-times-circle" aria-hidden="true"></i></button>
        <form action="{{ route('admin.postchangepassword') }}"  method="POST" class="form-container">
            <h1>Đổi mật khẩu</h1>
            @csrf
            <input style="display: none" type="text" name="id" value="{{ $user->id }}" id="">
            <label for="email"><b>Mật khẩu cũ</b></label>
            <input type="password" placeholder="Mật khẩu cũ" name="oldpassword">
        
            <label for="psw"><b>Mật khẩu mới</b></label>
            <input type="password" placeholder="Mật khẩu mới" name="newpassword">

            <label for="psw"><b>Nhập lại mật khẩu mới</b></label>
            <input type="password" placeholder="Nhập lại mật khẩu" name="renewpassword">
        
            <button type="submit" class="btn">Đổi mật khẩu</button>
        </form>
    </div>
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    function openForm() {
      document.getElementById("myForm").style.display = "block";
    }
    
    function closeForm() {
      document.getElementById("myForm").style.display = "none";
    }
</script>