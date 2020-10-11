@extends('frontend.layout.master')
@section('content')
<style>
  body {
  }
  
  /* Profile container */
  .profile {
    margin: 20px 0;
  }
  
  /* Profile sidebar */
  .profile-sidebar {
    padding: 20px 0 10px 0;
    background: #fff;
  }
  
  .profile-userpic img {
    float: none;
    margin: 0 auto;
    width: 50%;
    height: 50%;
    -webkit-border-radius: 50% !important;
    -moz-border-radius: 50% !important;
    border-radius: 50% !important;
  }
  
  .profile-usertitle {
    text-align: center;
    margin-top: 20px;
  }
  
  .profile-usertitle-name {
    color: #5a7391;
    font-size: 16px;
    font-weight: 600;
    margin-bottom: 7px;
  }
  
  .profile-usertitle-job {
    text-transform: uppercase;
    color: #5b9bd1;
    font-size: 12px;
    font-weight: 600;
    margin-bottom: 15px;
  }
  
  .profile-userbuttons {
    text-align: center;
    margin-top: 10px;
  }
  
  .profile-userbuttons .btn {
    text-transform: uppercase;
    font-size: 11px;
    font-weight: 600;
    padding: 6px 15px;
    margin-right: 5px;
  }
  
  .profile-userbuttons .btn:last-child {
    margin-right: 0px;
  }
      
  .profile-usermenu {
    margin-top: 30px;
  }
  
  .profile-usermenu ul li {
    border-bottom: 1px solid #f0f4f7;
  }
  
  .profile-usermenu ul li:last-child {
    border-bottom: none;
  }
  
  .profile-usermenu ul li a {
    color: #93a3b5;
    font-size: 14px;
    font-weight: 400;
  }
  
  .profile-usermenu ul li a i {
    margin-right: 8px;
    font-size: 14px;
  }
  
  .profile-usermenu ul li a:hover {
    background-color: #fafcfd;
    color: #5b9bd1;
  }
  
  .profile-usermenu ul li.active {
    border-bottom: none;
  }
  
  .profile-usermenu ul li.active a {
    color: #5b9bd1;
    background-color: #f6f9fb;
    border-left: 2px solid #5b9bd1;
    margin-left: -2px;
  }
  
  /* Profile Content */
  .profile-content {
    padding: 20px;
    background: #fff;
    min-height: 460px;
  }
</style>
<!-- Cart view section -->
 <section style="background: #F1F3FA;" id="aa-myaccount">
  <div class="container">
    <div class="row profile">
		<div class="col-md-3">
			<div class="profile-sidebar">
				<!-- SIDEBAR USERPIC -->
				<div class="profile-userpic">
					<img style="height: 150px;width: 150px;" src="{{ Auth::user()->image_profile }}" class="img-responsive" alt="">
                    {{--  <form action="">
                        <input style="z-index: 0;top: -100px;background-image: url({{ Auth::user()->image_profile }});width: 20px;" type="file">
                        <button>Lưu</button>
                    </form>  --}}
                </div>
				<!-- END SIDEBAR USERPIC -->
				<!-- SIDEBAR USER TITLE -->
				<div class="profile-usertitle">
					<div class="profile-usertitle-name">
						{{ Auth::user()->fullname }}
					</div>
					{{--  <div class="profile-usertitle-job">
						Developer
					</div>  --}}
				</div>
				<!-- END SIDEBAR USER TITLE -->
				<!-- SIDEBAR BUTTONS -->
				<!-- END SIDEBAR BUTTONS -->
				<!-- SIDEBAR MENU -->
				<div class="profile-usermenu">
          @php
           $url = url()->current();
           $item = explode('/',$url);
           $active = $item[count($item)-1];
          @endphp

					<ul class="nav">
						@if ($active == 'account')
              <li class="active">
                <a href="{{ route('frontend.account') }}">
                <i class="glyphicon glyphicon-home"></i>
                Thông tin tài khoản </a>
              </li>
            @else
              <li>
                <a href="{{ route('frontend.account') }}">
                <i class="glyphicon glyphicon-home"></i>
                Thông tin tài khoản </a>
              </li>
            @endif

						@if ($active == 'changepass')
              <li class="active">
                <a href="{{ route('frontend.changepass') }}">
                <i class="glyphicon glyphicon-user"></i>
                Đổi mật khẩu </a>
              </li>
            @else
              <li>
                <a href="{{ route('frontend.changepass') }}">
                <i class="glyphicon glyphicon-user"></i>
                Đổi mật khẩu </a>
              </li>
            @endif
            
						@if ($active != 'account' && $active != 'changepass')
              <li class="active">
                <a href="{{ route('frontend.purchase') }}">
                <i class="glyphicon glyphicon-gift"></i>
                Quản lý đơn hàng </a>
              </li>
            @else
              <li>
                <a href="{{ route('frontend.purchase') }}">
                <i class="glyphicon glyphicon-gift"></i>
                Quản lý đơn hàng </a>
              </li>
            @endif
					</ul>
				</div>
				<!-- END MENU -->
			</div>
    </div>
		<div style="height: auto;background-color: #ffffff;padding: 20px 0px" class="col-md-9">
            @yield('content_user')
		</div>
	</div>
</div>
 </section>
 <!-- / Cart view section -->
 @endsection