@extends('frontend.account.master_user')
@section('content_user')
  <div class="profile-content">
      @if (session('success'))
          <span style="color: green;font-size: 20px">{{ session('success') }}</span>
      @endif
      <h2>Thông tin tài khoản</h2>
      <form enctype="multipart/form-data" action="{{ route('frontend.updateaccount') }}" method="POST" class="aa-login-form">
        @csrf
        <label for="">Tên đăng nhập</label>
        <input readonly type="text" value="{{ $user->username }}">
        <label for="">Họ và tên</label>
        <input name="name" type="text" value="{{ $user->fullname }}" >
        <span style="color: red">{{ $errors->first('name') }}</span><br>
        <label for="">Email</label>
        <input readonly type="text" value="{{ $user->email }}">
        <label for="">Số điện thoại</label>
        <input name="phone" type="text" value="{{ $user->phone }}" >
        <span style="color: red">{{ $errors->first('phone') }}</span><br>
        <label for="">Địa chỉ</label>
        <input name="address" type="text" value="{{ $user->address }}">
        <span style="color: red">{{ $errors->first('address') }}</span><br>
        <button class="aa-browse-btn" type="submit">Cập nhật</button>
      </form>
    </div>
@endsection
