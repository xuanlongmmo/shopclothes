@extends('frontend.layout.master')
@section('content') 
<div style="width: 500px;padding-top: 200px;margin: 0px 400px;margin-bottom: 80px">
    <div class="modal-body">
        <h1>Quên mật khẩu</h1>
        @if (!empty($fail))
            <h4 style="color: red">{{$fail}}</h4>
        @endif
        <form method="POST" class="aa-login-form" action="{{ route('frontend.sendmailreset') }}">
          @csrf
          <label for="">Nhập email đã đăng kí: </label>
          <input name="email" type="text" placeholder="Email">
          <span style="color: red">{{ $errors->first('email') }}</span><br>
          <button class="aa-browse-btn" type="submit">Quên mật khẩu</button>
        </form>
    </div> 
</div>
@endsection