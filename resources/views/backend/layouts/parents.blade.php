<!DOCTYPE html>
<html class="no-js">

<head>
    <meta charset="utf-8">

    <title>M.M.R Aabir Courier</title>

    <meta name="description" content="uAdmin is a Professional, Responsive and Flat Admin Template created by pixelcave and published on Themeforest">
    <meta name="author" content="pixelcave">
    <meta name="robots" content="noindex, nofollow">

    <meta name="viewport" content="width=device-width,initial-scale=1">
    <!-- <meta name="_token" content="{{csrf_token()}}"> -->

    <!-- Icons -->
    <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
    <link rel="shortcut icon" href="img/favicon.ico">
    <link rel="apple-touch-icon" href="img/icon57.png" sizes="57x57">
    <link rel="apple-touch-icon" href="img/icon72.png" sizes="72x72">
    <link rel="apple-touch-icon" href="img/icon76.png" sizes="76x76">
    <link rel="apple-touch-icon" href="img/icon114.png" sizes="114x114">
    <link rel="apple-touch-icon" href="img/icon120.png" sizes="120x120">
    <link rel="apple-touch-icon" href="img/icon144.png" sizes="144x144">
    <link rel="apple-touch-icon" href="img/icon152.png" sizes="152x152">
    <!-- END Icons -->

    <!-- Stylesheets -->
    <!-- Bootstrap is included in its original form, unaltered -->
   @yield('css')
</head>

<!-- Add the class .fixed to <body> for a fixed layout on large resolutions (min: 1200px) -->
<!-- <body class="fixed"> -->

<body>
    <!-- Page Container -->
    <div id="page-container">
        <!-- Header -->
        <!-- Add the class .navbar-fixed-top or .navbar-fixed-bottom for a fixed header on top or bottom respectively -->
        <!-- <header class="navbar navbar-inverse navbar-fixed-top"> -->
        <!-- <header class="navbar navbar-inverse navbar-fixed-bottom"> -->
        
        <!-- END Header -->
        @if(Auth()->guard('admin')->check())

        @include('backend.layouts.header')

        @elseif(Auth()->guard('manager')->check())

        @include('backend.layouts.manager_header')

        @else(Auth()->guard('employee')->check())

        @include('backend.layouts.employee_header')

        @endif
          
        <!-- Inner Container -->
        <div id="inner-container">
        
            <!-- Sidebar -->
            <aside id="page-sidebar" class="collapse navbar-collapse navbar-main-collapse">
                <!-- Sidebar search -->
                @include('backend.layouts.search')
                <!-- END Sidebar search -->

                <!-- Left Navigation -->
                @if(Auth()->guard('admin')->check())

                @include('backend.layouts.leftbar')

                @elseif(Auth()->guard('manager')->check())

                @include('backend.layouts.manager_leftbar')

                @else(Auth()->guard('employee')->check())

                @include('backend.layouts.employee_leftbar')

                @endif

                
                <!-- END Left Navigation -->

                <!-- Demo Theme Options -->
                
                <!-- END Demo Theme Options -->
            </aside>
            <!-- END Sidebar -->

            <!-- Page Content -->
            <div id="page-content">
                <!-- Navigation info -->
                @yield('breadcum')
                <!-- END Navigation info -->

                <!-- Nav Dash -->
                
                <!-- END Nav Dash -->

                <!-- Tiles -->
                <!-- Row 1 -->
               @yield('content')
                <!-- END Row 1 -->

                <!-- Row 2 -->


                                     <!-- Statistic -->
                
                <!-- END Row 2 -->

                <!-- Row 3 -->

                                      <!-- New Orders -->

                <!-- END Row 3 -->
                <!-- END Tiles -->
            </div>
            <!-- END Page Content -->

            <!-- Footer -->
           @include('backend.layouts.footer')
            <!-- END Footer -->
        </div>
        <!-- END Inner Container -->
    </div>
    <!-- END Page Container -->

    <!-- Scroll to top link, check main.js - scrollToTop() -->
    <a href="javascript:void(0)" id="to-top"><i class="fa fa-chevron-up"></i></a>

    <!-- User Modal Settings, appears when clicking on 'User Settings' link found on user dropdown menu (header, top right) -->
    
    <!-- END User Modal Settings -->

    <!-- Excanvas for canvas support on IE8 -->
    <!--[if lte IE 8]><script src="js/helpers/excanvas.min.js"></script><![endif]-->

    <!-- Include Jquery library from Google's CDN but if something goes wrong get Jquery from local file (Remove 'http:' if you have SSL) -->
    @yield('js')

    <!-- Javascript code only for this page -->
    @yield('javascript')
</body>

</html>