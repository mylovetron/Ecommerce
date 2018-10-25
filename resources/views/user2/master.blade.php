<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="robots" content="all,follow">
    <meta name="googlebot" content="index,follow,snippet,archive">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Obaju e-commerce template">
    <meta name="author" content="Ondrej Svestka | ondrejsvestka.cz">
    <meta name="keywords" content="">

    <title>
        everythingOne
    </title>

    <meta name="keywords" content="">

    <link href='http://fonts.googleapis.com/css?family=Roboto:400,500,700,300,100' rel='stylesheet' type='text/css'>

   <!-- styles -->
    <link href="{{url('user/obaju/css/font-awesome.css')}}" rel="stylesheet">
    <link href="{{url('user/obaju/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{url('user/obaju/css/animate.min.css')}}" rel="stylesheet">
    <link href="{{url('user/obaju/css/owl.carousel.css')}}" rel="stylesheet">
    <link href="{{url('user/obaju/css/owl.theme.css')}}" rel="stylesheet">

    <!-- theme stylesheet -->
    <link href="{{url('user/obaju/css/style.default.css')}}" rel="stylesheet" id="theme-stylesheet">

    <!-- your stylesheet with modifications -->
    <link href="{{url('user/obaju/css/custom.css')}}" rel="stylesheet">

    <script src="{{url('user/obaju/js/respond.min.js')}}"></script>

    <link rel="shortcut icon" href="favicon.png">



</head>

<body>
  
    @include('user2.blocks.navbar')
    <div id="all">
        <div id="content">
           @yield('content')
        </div>
    </div>
    @include('user2.blocks.footer')
 <!-- *** SCRIPTS TO INCLUDE ***
 _________________________________________________________ -->
    <script src="{{url('user/obaju/js/jquery-1.11.0.min.js')}}"></script>
    <script type="text/javascript" src="{{url('user/obaju/js/myscript.js')}}"></script>
    <!-- /Myscript -->
    <script src="{{url('user/obaju/js/bootstrap.min.js')}}"></script>
    <script src="{{url('user/obaju/js/jquery.cookie.js')}}"></script>
    <script src="{{url('user/obaju/js/waypoints.min.js')}}"></script>
    <script src="{{url('user/obaju/js/modernizr.js')}}"></script>
    <script src="{{url('user/obaju/js/bootstrap-hover-dropdown.js')}}"></script>
    <script src="{{url('user/obaju/js/owl.carousel.min.js')}}"></script>
    <script src="{{url('user/obaju/js/front.js')}}"></script>
    <!-- my script -->
    

</body>

</html>