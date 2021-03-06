<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">    
    <title>Shop Clothes | Home</title>
    <link rel="icon" href="https://nganhangphapluat.thukyluat.vn/images/CauHoi_Hinh/9eb6abaa-8cda-456c-ad66-26ba4da23ffe.jpg">
    <base href="{{asset("")}}">
    
    <!-- Font awesome -->
    <link href="sources/css/font-awesome.css" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="sources/css/bootstrap.css" rel="stylesheet">   
    <!-- SmartMenus jQuery Bootstrap Addon CSS -->
    <link href="sources/css/jquery.smartmenus.bootstrap.css" rel="stylesheet">
    <!-- Product view slider -->
    <link rel="stylesheet" type="text/css" href="sources/css/jquery.simpleLens.css">    
    <!-- slick slider -->
    <link rel="stylesheet" type="text/css" href="sources/css/slick.css">
    <!-- price picker slider -->
    <link rel="stylesheet" type="text/css" href="sources/css/nouislider.css">
    <!-- Theme color -->
    <link id="switcher" href="sources/css/theme-color/default-theme.css" rel="stylesheet">
    <!-- <link id="switcher" href="sources/css/theme-color/bridge-theme.css" rel="stylesheet"> -->
    <!-- Top Slider CSS -->
    <link href="sources/css/sequence-theme.modern-slide-in.css" rel="stylesheet" media="all">

    <!-- Main style sheet -->
    <link href="sources/css/style.css" rel="stylesheet">    

    <!-- Google Font -->
    <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
    

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesnt work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    {{--  Toastr  --}}
    <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
  </head>
  <body> 
  @include('frontend.layout.header')
  
  @yield('content')

  @include('frontend.layout.footer')

  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="sources/js/bootstrap.js"></script>  
  <!-- SmartMenus jQuery plugin -->
  <script type="text/javascript" src="sources/js/jquery.smartmenus.js"></script>
  <!-- SmartMenus jQuery Bootstrap Addon -->
  <script type="text/javascript" src="sources/js/jquery.smartmenus.bootstrap.js"></script>  
  <!-- To Slider JS -->
  <script src="sources/js/sequence.js"></script>
  <script src="sources/js/sequence-theme.modern-slide-in.js"></script>  
  <!-- Product view slider -->
  <script type="text/javascript" src="sources/js/jquery.simpleGallery.js"></script>
  <script type="text/javascript" src="sources/js/jquery.simpleLens.js"></script>
  <!-- slick slider -->
  <script type="text/javascript" src="sources/js/slick.js"></script>
  <!-- Price picker slider -->
  <script type="text/javascript" src="sources/js/nouislider.js"></script>
  <!-- Custom js -->
  <script src="sources/js/custom.js"></script> 
  @if (session('success'))
    <script>
      toastr.success("{{ Session::get('success') }}");
    </script>
  @elseif(session('error'))
    <script>
      toastr.error("{{ Session::get('error') }}");
    </script>
  @endif
  </body>
</html>