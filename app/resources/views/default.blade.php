<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        {{--<script type="text/javascript" src="/js/bootstrap/bootstrap.min.js"></script>--}}
        {{--<link rel="stylesheet" type="text/css" href="/css/bootstrap/bootstrap.min.css">--}}

        <title>Uplexis - PHP Test</title>

        <link rel="icon" type="image/png" sizes="16x16" href="/js/template/assets/images/favicon.png">
        <!-- Bootstrap Core CSS -->
        <link href="/js/template/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <!-- Custom CSS -->
        <link href="/css/template/style.css" rel="stylesheet">
        <!-- You can change the theme colors from here -->
        <link href="/css/template/colors/purple-dark.css" id="theme" rel="stylesheet">

        <script src="/js/template/assets/plugins/jquery/jquery.min.js"></script>

        <script src="/js/template/assets/plugins/bootstrap/js/tether.min.js"></script>
        <script src="/js/template/assets/plugins/bootstrap/js/bootstrap.min.js"></script>

        <script src="/js/template/jquery.slimscroll.js"></script>

        <script src="/js/template/waves.js"></script>

        <script src="/js/template/sidebarmenu.js"></script>

        <script src="/js/template/assets/plugins/sticky-kit-master/dist/sticky-kit.min.js"></script>

        <script src="/js/template/custom.min.js"></script>

        <script src="/js/template/assets/plugins/flot/jquery.flot.js"></script>
        <script src="/js/template/assets/plugins/flot.tooltip/js/jquery.flot.tooltip.min.js"></script>
        <script src="/js/template/flot-data.js"></script>
        <script src="/js/template/assets/plugins/styleswitcher/jQuery.style.switcher.js"></script>

        <style>
            .topbar .navbar-header {
                background: #272c3300;
                box-shadow: none;
            }

            .topbar {
                background: linear-gradient(135deg, #EA5C54 0%, #bb6dec 100%)
            }

            .sidebar-nav > ul > li > a.active, .sidebar-nav > ul > li > a:hover {
                border-left: 3px solid #d9618e;
            }
            .sidebar-nav ul li a.active, .sidebar-nav ul li a:hover {
                color: #c16bd9;
            }

            .sidebar-nav > ul > li > a.active i, .sidebar-nav > ul > li > a:hover i {
                color: #c06adb;
            }

            .card-no-border .left-sidebar {
                box-shadow: none;
            }
        </style>
    </head>
    <body class="fix-header card-no-border">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar">
            <nav class="navbar top-navbar navbar-toggleable-sm navbar-light">
                <!-- ============================================================== -->
                <!-- Logo -->
                <!-- ============================================================== -->
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.html">
                        <!-- Logo icon -->
                        <b>
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <!-- Dark Logo icon -->
                            {{--<img src="/js/template/assets/images/logo-icon.png" alt="homepage" class="dark-logo" />--}}

                        </b>
                        <!--End Logo icon -->
                        <!-- Logo text -->
                        <span>
                         <!-- dark Logo text -->
                         <img src="/js/template/assets/images/logo.png" alt="homepage" class="dark-logo" style="width: 100px;" />
                         </span> </a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav mr-auto mt-md-0 ">
                        <!-- This is  -->
                        <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
                        <li class="nav-item hidden-sm-down">
                            <form class="app-search p-l-20">
                                {{--<input type="text" class="form-control" placeholder="Search for..."> <a class="srh-btn"><i class="ti-search"></i></a>--}}
                            </form>
                        </li>
                    </ul>
                    <!-- ============================================================== -->
                    <!-- User profile and search -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav my-lg-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="/js/template/assets/images/users/5.jpg" alt="user" class="profile-pic m-r-5" />Admin</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li>
                            <a href="/" class="waves-effect"><i class="fa fa-home m-r-10" aria-hidden="true"></i>Início</a>
                        </li>
                        <li>
                            <a href="/catch" class="waves-effect"><i class="fa fa-bolt m-r-10" aria-hidden="true"></i>Capturar</a>
                        </li>
                        <li>
                            <a href="/articles" class="waves-effect"><i class="fa fa-th-list m-r-10" aria-hidden="true"></i>Artigos</a>
                        </li>
                        <li>
                            <a href="/logoff" class="waves-effect"><i class="fa fa-power-off m-r-10" aria-hidden="true"></i>Sair</a>
                        </li>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <div class="page-wrapper">
            <div class="container-fluid">
                @yield('content')
            </div>
            <footer class="footer text-center">
                © 2017 Monster Admin by wrappixel.com
            </footer>
        </div>
    </div>
    </body>
</html>
