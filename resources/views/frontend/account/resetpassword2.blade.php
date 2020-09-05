@extends('frontend.layout.master')
@section('content') 
<div style="width: 500px;padding-top: 200px;margin: 0px 400px;margin-bottom: 80px">
    <div class="modal-body">
        <h1>Quên mật khẩu</h1>
        @if (!empty($fail))
            <h4 style="color: red">{{$fail}}</h4>
        @endif
        <form method="POST" class="aa-login-form" action="{{ route('frontend.sendpassreset') }}">
          @csrf
          <input style="display: none" type="text" name="email" value="{{ $email }}">
          <label for="">Nhập mật khẩu:</label>
          <input name="password" type="password">
          <span style="color: red">{{ $errors->first('password') }}</span><br>
          <label for="">Nhập lại mật khẩu:</label>
          <input name="repassword" type="password">
          <span style="color: red">{{ $errors->first('repassword') }}</span><br>
          <button class="aa-browse-btn" type="submit">Đổi mật khẩu</button>
        </form>
    </div> 
</div>
@endsection