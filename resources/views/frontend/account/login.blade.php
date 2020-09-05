@extends('frontend.layout.master')
@section('content') 
<div style="width: 500px;padding-top: 200px;margin: 0px 400px;margin-bottom: 40px">
    <div class="modal-body">
        <h1>Đăng nhập</h4>
        <form method="POST" class="aa-login-form" action="{{ route('frontend.login') }}">
          @csrf
          <label for="">Tài khoản<span>*</span></label>
          <input name="username" type="text" placeholder="Tài khoản">
          <span style="color: red">{{ $errors->first('username') }}</span><br>
          <label for="">Mật khẩu<span>*</span></label>
          <input name="password" type="password" placeholder="Mật khẩu">
          <span style="color: red">{{ $errors->first('password') }}</span><br>
          <button class="aa-browse-btn" type="submit">Đăng nhập</button>
          <label for="rememberme" class="rememberme"><input type="checkbox" id="rememberme"> Ghi nhớ đăng nhập </label>
          <p class="aa-lost-password"><a href="{{ route('frontend.getreset') }}">Quên mật khẩu?</a></p>
          <div class="aa-register-now">
            <div class="google">
              <a href="{{ route('frontend.redirect', ['provider'=>'google']) }}" class="google btn">
                <i class="fa fa-google fa-fw"></i> Đăng nhập bằng Google
              </a>
            </div> 
            <div style="height: 10px;">
            </div>
            <div class="fb">
              <a href="{{ route('frontend.redirect', ['provider'=>'facebook']) }}" class="fb btn">
                <i class="fa fa-facebook fa-fw"></i> Đăng nhập bằng Facebook
               </a> 
            </div>
            <div style="height: 10px;">
            </div>
            Bạn chưa có tài khoản ? <a style="color: red" href="{{ route('frontend.register') }}">Đăng kí ở đây!</a>
          </div>
        </form>
    </div> 
</div>
@endsection
<style>

  .fb {
    background-color: #3B5998;
    color: white;
    text-align: center;
  }

  .fb a{
    font-size: 15px;
  }
  
  .google {
    background-color: #dd4b39;
    color: white;
    text-align: center;
  }

  .google a{
    font-size: 15px;
  }
</style>