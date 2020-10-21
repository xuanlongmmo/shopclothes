<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <meta charset="utf-8" />
    <title>Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta content="" name="description" />
    <meta content="" name="author" />
    <base href="{{asset("")}}">
    <!-- BEGIN PLUGIN CSS -->
    <link href="assets/plugins/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/gritter/css/jquery.gritter.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/bootstrap-datepicker/css/datepicker.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="assets/plugins/jquery-ricksaw-chart/css/rickshaw.css" type="text/css" media="screen">
    <link rel="stylesheet" href="assets/plugins/jquery-morris-chart/css/morris.css" type="text/css" media="screen">
    <link href="assets/plugins/bootstrap-select2/select2.css" rel="stylesheet" type="text/css" media="screen" />
    <link href="assets/plugins/jquery-jvectormap/css/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" media="screen" />
    <!-- END PLUGIN CSS -->
    <!-- BEGIN PLUGIN CSS -->
    <link href="assets/plugins/pace/pace-theme-flash.css" rel="stylesheet" type="text/css" media="screen" />
    <link href="assets/plugins/bootstrapv3/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/bootstrapv3/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="assets/plugins/animate.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/jquery-scrollbar/jquery.scrollbar.css" rel="stylesheet" type="text/css" />
    <!-- END PLUGIN CSS -->
    <!-- BEGIN CORE CSS FRAMEWORK -->
    <link href="webarch/css/webarch.css" rel="stylesheet" type="text/css" />
    <!-- END CORE CSS FRAMEWORK -->

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.css">

  </head>
  <!-- END HEAD -->
  <!-- BEGIN BODY -->
  <body class="">
    <!-- BEGIN HEADER -->
    <div class="header navbar navbar-inverse ">
      <!-- BEGIN TOP NAVIGATION BAR -->
      <div class="navbar-inner">
        <div class="header-seperation">
          <ul class="nav pull-left notifcation-center visible-xs visible-sm">
            <li class="dropdown">
              <a href="#main-menu" data-webarch="toggle-left-side">
                <i class="material-icons">menu</i>
              </a>
            </li>
          </ul>
          <!-- BEGIN LOGO -->
          <a href="{{ route('admin') }}">
            <img src="assets/img/logo.png" class="logo" alt="" data-src="assets/img/logo.png" data-src-retina="assets/img/logo2x.png" width="106" height="21" />
          </a>
          <!-- END LOGO -->
          <ul class="nav pull-right notifcation-center">
            <li class="dropdown hidden-xs hidden-sm">
              <a href="{{ route('admin') }}" class="dropdown-toggle active" data-toggle="">
                <i class="material-icons">home</i>
              </a>
            </li>
            <li class="dropdown hidden-xs hidden-sm">
              <a href="{{ route('admin.contact') }}" class="dropdown-toggle">
                <i class="material-icons">email</i><span class="badge bubble-only"></span>
              </a>
            </li>
            <li class="dropdown visible-xs visible-sm">
              <a href="#" data-webarch="toggle-right-side">
                <i class="material-icons">chat</i>
              </a>
            </li>
          </ul>
        </div>
        <!-- END RESPONSIVE MENU TOGGLER -->
        <div class="header-quick-nav">
          <!-- BEGIN TOP NAVIGATION MENU -->
          <div class="pull-left">
            <ul class="nav quick-section">
              <li class="quicklinks">
                <a href="#" class="" id="layout-condensed-toggle">
                  <i class="material-icons">menu</i>
                </a>
              </li>
            </ul>
            <ul class="nav quick-section">
              <li class="quicklinks  m-r-10">
                <a href="{{ url()->current() }}" class="">
                  <i class="material-icons">refresh</i>
                </a>
              </li>
              <li class="quicklinks">
                <a href="#" class="">
                  <i class="material-icons">apps</i>
                </a>
              </li>
              <li class="quicklinks"> <span class="h-seperate"></span></li>
              <li class="quicklinks">
                <a href="#" class="" id="my-task-list" data-placement="bottom" data-content='' data-toggle="dropdown" data-original-title="Notifications">
                  <i class="material-icons">notifications_none</i>
                  <span class="badge badge-important bubble-only"></span>
                </a>
              </li>
              <li class="m-r-10 input-prepend inside search-form no-boarder">
                <span class="add-on"> <i class="material-icons">search</i></span>
                <input name="" type="text" class="no-boarder " placeholder="Search Dashboard" style="width:250px;">
              </li>
            </ul>
          </div>
          <div id="notification-list" style="display:none">
            <div style="width:300px">
              <div class="notification-messages info">
                <div class="user-profile">
                  <img src="assets/img/profiles/d.jpg" alt="" data-src="assets/img/profiles/d.jpg" data-src-retina="assets/img/profiles/d2x.jpg" width="35" height="35">
                </div>
                <div class="message-wrapper">
                  <div class="heading">
                    David Nester - Commented on your wall
                  </div>
                  <div class="description">
                    Meeting postponed to tomorrow
                  </div>
                  <div class="date pull-left">
                    A min ago
                  </div>
                </div>
                <div class="clearfix"></div>
              </div>
              <div class="notification-messages danger">
                <div class="iconholder">
                  <i class="icon-warning-sign"></i>
                </div>
                <div class="message-wrapper">
                  <div class="heading">
                    Server load limited
                  </div>
                  <div class="description">
                    Database server has reached its daily capicity
                  </div>
                  <div class="date pull-left">
                    2 mins ago
                  </div>
                </div>
                <div class="clearfix"></div>
              </div>
              <div class="notification-messages success">
                <div class="user-profile">
                  <img src="assets/img/profiles/h.jpg" alt="" data-src="assets/img/profiles/h.jpg" data-src-retina="assets/img/profiles/h2x.jpg" width="35" height="35">
                </div>
                <div class="message-wrapper">
                  <div class="heading">
                    You haveve got 150 messages
                  </div>
                  <div class="description">
                    150 newly unread messages in your inbox
                  </div>
                  <div class="date pull-left">
                    An hour ago
                  </div>
                </div>
                <div class="clearfix"></div>
              </div>
            </div>
          </div>
          <!-- END TOP NAVIGATION MENU -->
        </div>
        <!-- END TOP NAVIGATION MENU -->
      </div>
      <!-- END TOP NAVIGATION BAR -->
    </div>
    <!-- END HEADER -->
    <!-- BEGIN CONTAINER -->
    <div class="page-container row">
      <!-- BEGIN SIDEBAR -->
      <div class="page-sidebar " id="main-menu">
        <!-- BEGIN MINI-PROFILE -->
        <div class="page-sidebar-wrapper scrollbar-dynamic" id="main-menu-wrapper">
          <div class="user-info-wrapper sm">
            <div class="profile-wrapper sm">
              <img src="{{ Auth::user()->image_profile }}" alt="" data-src="{{ Auth::user()->image_profile }}" data-src-retina="{{ Auth::user()->image_profile }}" width="69" height="69" />
              <div class="availability-bubble online"></div>
            </div>
            <div class="user-info sm">
              <div class="username"><span class="semi-bold"><a href="{{ route('admin.editmyaccount', ['id'=>Auth::user()->id]) }}">{{ Auth::user()->username }}</a></span></div>
              <div class="status">Life goes on...</div>
            </div>
          </div>
          <!-- END MINI-PROFILE -->
          <!-- BEGIN SIDEBAR MENU -->
          <p class="menu-title sm">BROWSE <span class="pull-right"><a href="{{ url()->current() }}"><i class="material-icons">refresh</i></a></span></p>
          <ul>
            <li class="start  open active "> <a href="{{ route('admin') }}"><i class="material-icons">home</i> <span class="title">Dashboard</span> <span class="selected"></span>  </a></li>
            {{--  <li>
              <a href="widgets.html"> <i class="material-icons">panorama_horizontal</i> <span class="title">Widgets</span> <span class="label label-important bubble-only pull-right "></span></a>
            </li>  --}}
            <li>
              <a href="{{ route('admin.order') }}"> <i class="fa fa-shopping-cart" aria-hidden="true"></i><span class="title">Đơn hàng</span> <span class=" badge badge-disable pull-right ">{{ count($data_unique_order) }}</span>
              </a>
            </li>
            <li>
                <a href="{{ route('admin.contact') }}"> <i class="material-icons">email</i> <span class="title">Liên hệ</span> <span class=" badge badge-disable pull-right ">{{ count($data_messeger) }}</span>
                </a>
            </li>
            <li>
              <a href="javascript:;"> <i class="fa fa-list" aria-hidden="true"></i> <span class="title">Quản lý danh mục</span> <span class=" arrow"></span> </a>
              <ul class="sub-menu">
                <li> <a href="{{ route('admin.category') }}">Danh sách danh mục sản phẩm</a> </li>
                <li> <a href="{{ route('admin.addcategory') }}">Thêm danh mục sản phẩm</a> </li>
                <li> <a href="{{ route('admin.categorynews') }}">Danh sách danh mục tin tức</a> </li>
                <li> <a href="{{ route('admin.addcategorynews') }}">Thêm danh mục tin tức</a> </li>
              </ul>
            </li>
            <li>
                <a href="javascript:;"> <i class="fa fa-futbol-o" aria-hidden="true"></i> <span class="title">Quản lý sản phẩm</span> <span class=" arrow"></span> </a>
                <ul class="sub-menu">
                  <li> <a href="{{ route('admin.product') }}">Danh sách sản phẩm </a> </li>
                  <li> <a href="{{ route('admin.addproduct') }}">Thêm sản phẩm</a> </li>
                </ul>
            </li>
            <li>
              <a href="javascript:;"> <i class="fa fa-newspaper-o" aria-hidden="true"></i> <span class="title">Quản lý tin</span> <span class=" arrow"></span> </a>
              <ul class="sub-menu">
                <li> <a href="{{ route('admin.news') }}">Danh sách tin</a> </li>
                <li> <a href="{{ route('admin.addnews') }}">Thêm tin mới</a> </li>
              </ul>
          </li>
            <li>
                <a href="javascript:;"><i class="fa fa-money" aria-hidden="true"></i> <span class="title">Quản lý doanh thu</span> <span class=" arrow"></span> </a>
                <ul class="sub-menu">
                  <li> <a href="{{ route('admin.list_import') }}">Danh sách nhập</a> </li>
                  <li> <a href="{{ route('admin.import_goods') }}">Nhập hàng</a> </li>
                  <li> <a href="{{ route('admin.sales') }}">Doanh số</a> </li>
                </ul>
            </li>
            <li>
              <a href="javascript:;"> <i class="fa fa-cc-discover" aria-hidden="true"></i> <span class="title">Quản lý discount</span> <span class=" arrow"></span> </a>
              <ul class="sub-menu">
                <li> <a href="{{ route('admin.discount') }}">Danh sách discount</a> </li>
                <li> <a href="{{ route('admin.adddiscount') }}">Thêm discount</a> </li>
              </ul>
          </li>
            <li>
              <a href="javascript:;"> <i class="fa fa-info-circle" aria-hidden="true"></i> <span class="title">Quản lý website</span> <span class=" arrow"></span> </a>
              <ul class="sub-menu">
                <li> <a href="{{ route('admin.branch') }}">Quản lý chi nhánh</a> </li>
                <li> <a href="{{ route('admin.banner') }}">Quản lý banner</a> </li>
                <li> <a href="{{ route('admin.section') }}">Quản lý section</a> </li>
              </ul>
          </li>
            <li>
                <a href="javascript:;"> <i class="fa fa-truck" aria-hidden="true"></i> <span class="title">Quản lý giao hàng</span> <span class=" arrow"></span> </a>
                <ul class="sub-menu">
                  <li> <a href="">Đã giao</a> </li>
                  <li> <a href="">Đang giao</a> </li>
                </ul>
            </li>
            <li>
                <a href="javascript:;"> <i class="fa fa-user" aria-hidden="true"></i> <span class="title">Quản lý người dùng</span> <span class=" arrow"></span> </a>
                <ul class="sub-menu">
                  <li> <a href="{{ route('admin.listuser') }}">Danh sách người dùng</a> </li>
                  <li> <a href="{{ route('admin.listcomment') }}">Danh sách comment</a> </li>
                </ul>
            </li>
            <li>
                <a href="{{ route('admin.listsubadmin') }}"> <i class="material-icons">airplay</i> <span class="title">Quản lý quyền truy cập</span>
                </a>
            </li>
          </ul>
          <!-- END SIDEBAR MENU -->
        </div>
      </div>
      <a href="#" class="scrollup">Scroll</a>
      <div class="footer-widget">
        <div class="progress transparent progress-small no-radius no-margin">
          <div class="progress-bar progress-bar-success animate-progress-bar" data-percentage="79%" style="width: 79%;"></div>
        </div>
        <div class="pull-right">
          <div class="details-status"> <span class="animate-number" data-value="100" data-animation-duration="560"></span>% </div>
          <a href="{{ route('admin.logout') }}"><i class="material-icons">power_settings_new</i></a></div>
      </div>
      <!-- END SIDEBAR -->
      <!-- BEGIN PAGE CONTAINER-->
      <div class="page-content">
        <!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
        <div id="portlet-config" class="modal hide">
          <div class="modal-header">
            <button data-dismiss="modal" class="close" type="button"></button>
            <h3>Widget Settings</h3>
          </div>
          <div class="modal-body"> Widget settings form goes here </div>
        </div>
        <div class="clearfix"></div>
            <div class="content ">
                @yield('content')
            </div>
        </div>
      </div>
      <!-- END CONTAINER -->
    </div>
    <script src="assets/plugins/pace/pace.min.js" type="text/javascript"></script>
    <!-- BEGIN JS DEPENDECENCIES-->
    <script src="assets/plugins/jquery/jquery-1.11.3.min.js" type="text/javascript"></script>
    <script src="assets/plugins/bootstrapv3/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="assets/plugins/jquery-block-ui/jqueryblockui.min.js" type="text/javascript"></script>
    <script src="assets/plugins/jquery-unveil/jquery.unveil.min.js" type="text/javascript"></script>
    <script src="assets/plugins/jquery-scrollbar/jquery.scrollbar.min.js" type="text/javascript"></script>
    <script src="assets/plugins/jquery-numberAnimate/jquery.animateNumbers.js" type="text/javascript"></script>
    <script src="assets/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
    <script src="assets/plugins/bootstrap-select2/select2.min.js" type="text/javascript"></script>
    <!-- END CORE JS DEPENDECENCIES-->
    <!-- BEGIN CORE TEMPLATE JS -->
    <script src="webarch/js/webarch.js" type="text/javascript"></script>
    <script src="assets/js/chat.js" type="text/javascript"></script>
    <!-- END CORE TEMPLATE JS -->
    <!-- BEGIN PAGE LEVEL JS -->
    <script src="assets/plugins/jquery-ui/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
    <script src="assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js" type="text/javascript"></script>
    <script src="assets/plugins/jquery-block-ui/jqueryblockui.js" type="text/javascript"></script>
    <script src="assets/plugins/bootstrap-select2/select2.min.js" type="text/javascript"></script>
    <script src="assets/plugins/jquery-ricksaw-chart/js/raphael-min.js"></script>
    <script src="assets/plugins/jquery-ricksaw-chart/js/d3.v2.js"></script>
    <script src="assets/plugins/jquery-ricksaw-chart/js/rickshaw.min.js"></script>
    <script src="assets/plugins/jquery-morris-chart/js/morris.min.js"></script>
    <script src="assets/plugins/jquery-easy-pie-chart/js/jquery.easypiechart.min.js"></script>
    <script src="assets/plugins/jquery-slider/jquery.sidr.min.js" type="text/javascript"></script>
    <script src="assets/plugins/jquery-jvectormap/js/jquery-jvectormap-1.2.2.min.js" type="text/javascript"></script>
    <script src="assets/plugins/jquery-jvectormap/js/jquery-jvectormap-us-lcc-en.js" type="text/javascript"></script>
    <script src="assets/plugins/jquery-sparkline/jquery-sparkline.js"></script>
    <script src="assets/plugins/jquery-flot/jquery.flot.min.js"></script>
    <script src="assets/plugins/jquery-flot/jquery.flot.animator.min.js"></script>
    <script src="assets/plugins/skycons/skycons.js"></script>
    <script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="assets/js/jquery.dataTables.js" type="text/javascript"></script>
    <script>
        $(document).ready( function () {
            $('table').DataTable();
        } );
    </script>
    <script src="https://cdn.ckeditor.com/4.15.0/standard/ckeditor.js"></script>
    <script>
            CKEDITOR.replace( 'editor1' );
    </script>
    <script>
      CKEDITOR.replace( 'editor1', {
          filebrowserBrowseUrl: '{{ asset('ckfinder/ckfinder.html') }}',
          filebrowserImageBrowseUrl: '{{ asset('ckfinder/ckfinder.html?type=Images') }}',
          filebrowserFlashBrowseUrl: '{{ asset('ckfinder/ckfinder.html?type=Flash') }}',
          filebrowserUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files') }}',
          filebrowserImageUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images') }}',
          filebrowserFlashUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash') }}'
      } );
    </script>
    <!-- END PAGE LEVEL PLUGINS   -->
    <!-- PAGE JS -->
    <script src="assets/js/dashboard.js" type="text/javascript"></script>
  </body>
</html>