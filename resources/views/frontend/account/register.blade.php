@extends('frontend.layout.master')
@section('content') 
<div style="width: 500px;padding-top: 200px;margin: 0px 400px;margin-bottom: 80px">
    <div class="modal-body">
        <h1>Tạo tài khoản</h4>
        <form method="POST" class="aa-login-form" action="{{ route('frontend.pregister') }}">
          @csrf
          <label for="">Tài khoản<span>*</span></label>
          <input name="username" type="text" placeholder="Tài khoản">
          <span style="color: red">{{ $errors->first('username') }}</span><br>
          <label for="">Họ và Tên<span>*</span></label>
          <input name="fullname" type="text" placeholder="Họ và Tên">
          <span style="color: red">{{ $errors->first('fullname') }}</span><br>
          <label for="">Email<span>*</span></label>
          <input name="email" type="text" placeholder="Email">
          <span style="color: red">{{ $errors->first('email') }}</span><br>
          <label for="">Mật khẩu<span>*</span></label>
          <input name="password" type="password" placeholder="Mật khẩu">
          <span style="color: red">{{ $errors->first('password') }}</span><br>
          <label for="">Nhập lại mật khẩu<span>*</span></label>
          <input name="repassword" type="password" placeholder="Nhập lại mật khẩu">
          <span style="color: red">{{ $errors->first('repassword') }}</span><br>
          <button class="aa-browse-btn" type="submit">Đăng kí</button>
          </div>
        </form>
    </div> 
</div>
@endsection