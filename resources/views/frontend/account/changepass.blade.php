@extends('frontend.account.master_user')
@section('content_user')
    <div class="profile-content">
        <h2>Đổi mật khẩu</h2>
        <form action="{{ route('frontend.postchangepass') }}" method="POST" class="aa-login-form">
          @csrf
          <label for=""> Mật khẩu cũ</label><br>
          <input style="width: 500px;" name="oldpass" type="password"><br>
          @if (session('errors'))
            <span style="color: red">{{ session('errors') }}</span><br>
          @endif
          <label for=""> Mật khẩu mới</label><br>
          <input style="width: 500px;" name="newpass" type="password"><br>
          <label for=""> Nhập lại mật khẩu mới</label><br>
          <input style="width: 500px;" name="renewpass" type="password"><br>
          <button class="aa-browse-btn" type="submit">Đổi mật khẩu</button>
        </form>
      </div>
@endsection