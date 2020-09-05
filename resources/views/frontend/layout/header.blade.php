<!-- wpf loader Two -->
    <div id="wpf-loader-two">          
      <div class="wpf-loader-two-inner">
        <span>Loading</span>
      </div>
    </div> 
    <!-- / wpf loader Two -->       
  <!-- SCROLL TOP BUTTON -->
    <a class="scrollToTop" href="#"><i class="fa fa-chevron-up"></i></a>
  <!-- END SCROLL TOP BUTTON -->
  <style>
    .alert {
      width: 300px;
      padding: 20px;
      background-color: #f44336;
      color: white;
      opacity: 0.5;
    }
    
    .closebtn {
      margin-left: 15px;
      color: white;
      font-weight: bold;
      float: right;
      font-size: 22px;
      line-height: 20px;
      cursor: pointer;
      transition: 0.3s;
    }
    
    .closebtn:hover {
      color: black;
    }
  </style>

  <!-- Start header section -->
  <header id="aa-header">
    <!-- start header top  -->
    <div class="aa-header-top">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="aa-header-top-area">
              <!-- start header top left -->
              <div class="aa-header-top-left">
                <!-- start language -->
                <div class="aa-language">
                  <div class="dropdown">
                    <a class="btn dropdown-toggle" href="#" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                      <img src="sources/img/flag/english.jpg" alt="english flag">ENGLISH
                      <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                      <li><a href="#"><img src="sources/img/flag/french.jpg" alt="">FRENCH</a></li>
                      <li><a href="#"><img src="sources/img/flag/english.jpg" alt="">ENGLISH</a></li>
                    </ul>
                  </div>
                </div>
                <!-- / language -->
                <!-- start currency -->
                {{--  <div class="aa-currency">
                  <div class="dropdown">
                    <a class="btn dropdown-toggle" href="#" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                      <i class="fa fa-usd"></i>USD
                      <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                      <li><a href="#"><i class="fa fa-euro"></i>EURO</a></li>
                      <li><a href="#"><i class="fa fa-jpy"></i>YEN</a></li>
                    </ul>
                  </div>
                </div>  --}}
                <!-- / currency -->
                <!-- start email -->
                <div class="cellphone hidden-xs">
                  <p><span class="fa fa-envelope-o"></span>{{ $data_unique[0]->email }}</p>
                </div>
                <!-- / email -->
                <!-- start cellphone -->
                <div class="cellphone hidden-xs">
                  <p><span class="fa fa-phone"></span>{{ $data_unique[0]->phone }}</p>
                </div>
                <!-- / cellphone -->
              </div>
              <!-- / header top left -->
              <div class="aa-header-top-right">
                <ul class="aa-head-top-nav-right">
                  @if (Auth::check())
                    <li class="hidden-xs"><a href="{{ route('frontend.wishlist') }}">Yêu thích</a></li>
                    <li class="hidden-xs"><a href="{{ route('frontend.cart') }}">Giỏ hàng</a></li>
                    <li>
                      <a style="color: coral" href="{{ route('frontend.account') }}">{{ Auth::user()->username }}</a> 
                      <a style="border: none" href="{{ route('frontend.logout') }}"><i class="fa fa-sign-out" aria-hidden="true"></i></a>
                    </li>
                  @else
                    <li class="hidden-xs"><a href="{{ route('frontend.cart') }}">Giỏ hàng</a></li>
                    <li><a href="{{ route('frontend.getlogin') }}">Đăng nhập</a></li>
                    <li><a href="{{ route('frontend.register') }}">Đăng kí</a></li>
                  @endif
                  {{--  <li class="hidden-xs"><a href="{{ route('frontend.checkout') }}">Checkout</a></li>  --}}
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- / header top  -->

    <!-- start header bottom  -->
    <div class="aa-header-bottom">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="aa-header-bottom-area">
              <!-- logo  -->
              <div class="aa-logo">
                <!-- Text based logo -->
                <a href="{{ route('frontend.index') }}">
                  <span class="fa fa-shopping-cart"></span>
                  <p>daily<strong>Shop</strong> <span>Your Shopping Partner</span></p>
                </a>
                <!-- img based logo -->
                <!-- <a href=""><img src="sources/img/logo.jpg" alt="logo img"></a> -->
              </div>
              <!-- / logo  -->
               <!-- cart box -->
              <div class="aa-cartbox">
                <a class="aa-cart-link" href="{{ route('frontend.cart') }}">
                  <span class="fa fa-shopping-basket"></span>
                  <span class="aa-cart-title">SHOPPING CART</span> 
                  @if (session()->has('count') || Auth::check())
                    <span id="cartttt" class="aa-cart-notify">{{ session('count') }}</span>
                  @else
                    <span class="aa-cart-notify">0</span> 
                  @endif
                </a>
                
              </div>
              <!-- / cart box -->
              <!-- search box -->
              <div class="aa-search-box">
                <form action="">
                  <input type="text" name="" id="" placeholder="Tìm kiếm sản phẩm ?">
                  <button type="submit"><span class="fa fa-search"></span></button>
                </form>
              </div>
              <!-- / search box -->             
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- / header bottom  -->
  </header>
  <!-- / header section -->
  <!-- menu -->
  <section id="menu">
    <div class="container">
      <div class="menu-area">
        <!-- Navbar -->
        <div class="navbar navbar-default" role="navigation">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>          
          </div>
          <div class="navbar-collapse collapse">
            <!-- Left nav -->
            <ul class="nav navbar-nav">
              <li><a href="{{ route('frontend.index') }}">Trang chủ</a></li>
              @foreach ($data_category as $item)
                    @if ($item->small_category_product->isNotEmpty())
                      <li><a href="{{ route('frontend.detailcategory', ['slug_name'=>$item->slug_name]) }}"> {{ $item->large_category_name }}<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                          @foreach ($item->small_category_product as $ite)
                            <li><a href="{{ route('frontend.detailcategory', ['slug_name'=>$ite->slug_name]) }}">{{ $ite->small_category_name }}</a></li>
                          @endforeach 
                        </ul>
                      </li>
                    @else
                      <li><a href="{{ route('frontend.detailcategory', ['slug_name'=>$item->slug_name]) }}">{{ $item->large_category_name }}</a></li>
                    @endif              
                    {{--  <li><a href="#">And more.. <span class="caret"></span></a>
                      <ul class="dropdown-menu">
                        <li><a href="#">Sleep Wear</a></li>
                        <li><a href="#">Sandals</a></li>
                        <li><a href="#">Loafers</a></li>                                      
                      </ul>
                    </li>  --}}
              @endforeach
              <li><a href="{{ route('frontend.blog') }}">Tin tức <span class="caret"></span></a>
                <ul class="dropdown-menu">                
                  <li><a href="#">Casual</a></li>
                  <li><a href="#">Sports</a></li>
                  <li><a href="#">Formal</a></li>
                </ul>
              </li>
              <li><a href="{{ route('frontend.contact') }}">Liên hệ</a></li>
              <li><a href="{{ route('frontend.contact') }}">Chi nhánh</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>       
    </div>
  </section>
  <!-- / menu -->