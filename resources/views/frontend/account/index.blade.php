@extends('frontend.layout.master')
@section('content')
<!-- Cart view section -->
 <section id="aa-myaccount">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
        <div  class="aa-myaccount-area">         
            <div class="row">
              <div class="col-md-6">
                <div class="aa-myaccount-login">
                <h4>Thông tin tài khoản</h4>
                <form enctype="multipart/form-data" action="{{ route('frontend.updateaccount') }}" method="POST" class="aa-login-form">
                  @csrf
                  <img style="margin: 0px 160px;width: 200px;height: 200px;border-radius: 100px" src="{{ $user->image_profile }}" alt=""><br>
                  <input name="image" style="margin: 5px 120px;" type="file">
                  <span style="color: red">{{ $errors->first('image') }}</span><br>
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
              </div>
            </div>          
         </div>
       </div>
     </div>
   </div>
 </section>
 <!-- / Cart view section -->
 @endsection