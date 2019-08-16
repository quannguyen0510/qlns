<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Meta, title, CSS, favicons, etc. -->
    <link rel="icon" href="images/favicon.ico" type="image/ico"/>
    <link rel="stylesheet" href="{{ asset('admin/cssprofile/bootstrap.min.css') }}">
    <!-- Bootstrap -->
    <link href="{{ asset('admin/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{ asset('admin/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="{{ asset('build/css/custom.min.css') }}" rel="stylesheet">
    <link href="{{ asset('build/css/profile.css') }}" rel="stylesheet">
</head>

<body class="nav-md">
<div id="app">
    <div class="container body">
        <div class="main_container">
            <div class="col-md-3 left_col">
                <div class="left_col scroll-view">
                    <div class="navbar nav_title" style="border: 0;">
                        <a href="index.html" class="site_title"><i class="fa fa-paw"></i> <span>Admin</span></a>
                    </div>

                    <div class="clearfix"></div>

                    <!-- menu profile quick info -->
                    <div class="profile clearfix">
                        <div class="profile_pic">
                        </div>
                        <div class="profile_info">
                            <span>Welcome,</span>
                            <h2>
                            @if (Auth::user())
                                {{ Auth::user()->name }}
                            @else
                                Stranger
                            @endif
                            </h2>
                        </div>
                    </div>
                    <!-- /menu profile quick info -->

                    <br/>

                    <!-- sidebar menu -->
                    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                        @if(Auth::user())
                        <div class="menu_section">
                            <ul class="nav side-menu">
                                <li><a><i class="fa fa-home"></i> Home </a></li>
                                @if (Auth::user()->id_role == config('custom.id_Hr') || Auth::user()->id_role == config('custom.id_Admin'))
                                <li><a href="{{ route('account.index') }}"><i class="fa fa-edit"></i> Quản Lý Nhân Viên </a></li>
                                @if(Auth::user()->id_role == config('custom.id_Admin'))
                                <li><a href="{{ route('admin.role.dashboard') }}"><i class="fa fa-edit"></i> Quản Lý Phân Quyền </a></li>
                                @endif
                                <li><a href="{{ route('admin.salary.dashboard') }}"><i class="fa fa-table"></i> Bảng Chấm Công </a></li>
                                <li><a href="{{route('news.index')}}"><i class="fa fa-edit"></i> Quản Lý Tin Tức </a> </li>
                                @endif
                                <li><a href="{{route('salary.index')}}"> Work Checker</a></li>
                                <li><a href=""> Profile</a></li>
                                <li><a href="{{ route('admin.logout') }}"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                            </ul>
                        </div>
                        @endif
                    </div>
                    <!-- /sidebar menu -->

                    <!-- /menu footer buttons -->
                    <div class="sidebar-footer hidden-small">
                        <a data-toggle="tooltip" data-placement="top" title="Settings">
                            <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                            <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="Lock">
                            <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="Logout" href="">
                            <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                        </a>
                    </div>
                    <!-- /menu footer buttons -->
                </div>
            </div>

            <!-- top navigation -->
            <div class="top_nav">
                <div class="nav_menu">
                    <nav>
                        <div class="nav toggle">
                            <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                        </div>

                        <ul class="nav navbar-nav navbar-right">
                            <li class="">
                                <a href="" class="user-profile dropdown-toggle" data-toggle="dropdown"
                                   aria-expanded="false">
                                    <span class=" fa fa-angle-down"></span>
                                </a>
                                <ul class="dropdown-menu dropdown-usermenu pull-right">
                                    <li><a href="{{ route('profile.index') }}"> Profile</a></li>
                                    <li><a href="{{ route('admin.logout') }}"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                                    </li>
                                </ul>
                            </li>

                            <li role="presentation" class="dropdown">
                                <a href="" class="dropdown-toggle info-number" data-toggle="dropdown"
                                   aria-expanded="false">
                                    <span>
                                        @if(Auth::user())
                                        {{ Auth::user()->name }}
                                        @endif
                                    </span>

                                </a>
                                <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                                    <li>
                                        <a>
                                            <span>John Smith</span>
                                            <span class="time">3 mins ago</span>
                                            <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a>

                                            <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                                            <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a>

                                            <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                                            <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a>

                                            <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                                            <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                                        </a>
                                    </li>
                                    <li>
                                        <div class="text-center">
                                            <a>
                                                <strong>See All Alerts</strong>
                                                <i class="fa fa-angle-right"></i>
                                            </a>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
            <!-- /top navigation -->

            <!-- page content -->
            <div class="right_col" role="main">
                @yield('content')
            </div>
            <!-- /page content -->

            <!-- footer content -->
            <footer>
                <div class="pull-right">
                    Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
                </div>
                <div class="clearfix"></div>
            </footer>
            <!-- /footer content -->
        </div>
    </div>
</div>
<script src="{{ asset('admin/jsprofile/jquery.min.js') }}"></script>
<script src="{{ asset('admin/jsprofile/bootstrap.min.js') }}"></script>
<!-- jQuery -->
<script src="{{ asset('admin/js/jquery.min.js') }}"></script>
<!-- Bootstrap -->
<script src="{{ asset('admin/js/bootstrap.min.js') }}"></script>
<!-- Custom Theme Scripts -->
<script src="{{ asset('build/js/custom.min.js') }}"></script>
<script src="{{ asset('js/laroute.js') }}"></script>
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>

