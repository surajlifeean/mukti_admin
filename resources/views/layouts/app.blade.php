<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Mukti_Admin') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!--styles from template-->


    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="css/metisMenu.min.css" rel="stylesheet">

    <!-- Timeline CSS -->
    <link href="css/timeline.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/startmin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="css/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!--ends here-->

        <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>


  <link href="css/select2.css" rel="stylesheet" />
<script src="js/select2.js"></script>
@yield('stylesheet')
</head>
<body>
    <div id="wrapper">

    <!-- Navigation -->
    <nav class="navbar navbar-inverse " role="navigation">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">Admin</a>
        </div>

        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>

        <!-- Top Navigation: Left Menu -->
        <ul class="nav navbar-nav navbar-left navbar-top-links">
            <li><a href="http://www.janmukti.com"><i class="fa fa-home fa-fw"></i> Website</a></li>
        </ul>

        <!-- Top Navigation: Right Menu -->
        <ul class="nav navbar-right navbar-top-links">
            <li class="dropdown navbar-inverse">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-bell fa-fw"></i> <b class="caret"></b>
                </a>
                <ul class="dropdown-menu dropdown-alerts">
                    <li>
                        <a href="#">
                            <div>
                                <i class="fa fa-comment fa-fw"></i> New Comment
                                <span class="pull-right text-muted small">4 minutes ago</span>
                            </div>
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a class="text-center" href="#">
                            <strong>See All Alerts</strong>
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>            </li>
        </ul>
        <!-- Sidebar -->
        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse">

                <ul class="nav" id="side-menu">
                    <li class="sidebar-search">
                        <div class="input-group custom-search-form">
                            <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                    <button class="btn btn-primary" type="button">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                        </div>
                    </li>
                    <li>
                        <a href="#" class="active"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                    </li>
                     <li>
                          <a href="#"><i class="fa fa-sitemap fa-fw"></i> Options<span class="fa arrow"></span></a>
                          <ul class="nav nav-second-level">
                            <li>
                                <a href="{{route('customers.index')}}">Bulk Upload</a>
                            </li>
                            <li>
                                <a href="{{url('/report')}}">Download Report</a>
                            </li>
                            <li>
                                <a href="{{route('customerdetails.index')}}">View Customers</a>
                            </li>
                            <li>
                                <a href="{{url('/register')}}">Register Customers</a>
                            </li>

                           </ul>
                            <li>
                                <a href="#">Finance <span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level">
                                    <li>
                                        <a href="#">Daily Cash Book</a>
                                    </li>
                                    <li>
                                        <a href="#">Bank Deposit Report</a>
                                    </li>
                                    <li>
                                        <a href="#">Dividend Report</a>
                                    </li>
                                    <li>
                                        <a href="#">Revenue Report</a>
                                    </li>
                                    <li>
                                        <a href="#">Expenses Report</a>
                                    </li>
                                    <li>
                                        <a href="#">Capital Inflow Report</a>
                                    </li>
                                    <li>
                                        <a href="#">Daily Cash Book</a>
                                    </li>
                                </ul>
                            </li>
                             <li>
                                <a href="#">Groups<span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level">
                                    <li>
                                        <a href="#">View Groups</a>
                                    </li>
                                    <li>
                                        <a href="{{route('group.index')}}">Create Groups</a>
                                    </li>
                                </ul>
                            </li>

                        
                    </li>
                </ul>

            </div>
        </div>

    <!-- Page Content -->
    </nav>
</div>

        @yield('content')


    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>

    <!--scripts from template-->
    
<!-- jQuery -->
<script src="js/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="js/metisMenu.min.js"></script>

<!-- Custom Theme JavaScript -->
<script src="js/startmin.js"></script>

  @yield('script')
</body>
</html>
