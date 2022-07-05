<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> {{ env('APP_NAME') }} | @yield('title') </title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('admin')}}/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet"
          href="{{ asset('admin')}}/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('admin')}}/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{ asset('admin')}}/plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('admin')}}/dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('admin')}}/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('admin')}}/plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('admin')}}/plugins/summernote/summernote-bs4.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('admin')}}/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="{{ asset('admin')}}/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <!-- Bootstrap4 Duallistbox -->
    <link rel="stylesheet" href="{{ asset('admin')}}/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">

    <link rel="stylesheet" href="{{ asset('admin')}}/plugins/toastr/toastr.min.css">

    <link rel="stylesheet" href="{{ asset('admin')}}/plugins/datatables-bs4/css/dataTables.bootstrap4.css">

    <style>
        .tbl-product-img {
            width: 50px;
            height: 50px;
        }

        .error-help-block {
            color: red !important;
        }

        #loader {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            width: 100%;
            background: rgba(0, 0, 0, 0.75) url({{asset('admin') }}/assets/logo.png) no-repeat center center;
            z-index: 10000;
        }

        .action-width {
            width: 15%;
        }
    </style>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div id="loader"></div>
<script type="text/javascript">
    $('#loader').fadeIn();
</script>
<div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light nav-fix">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
            </li>

        </ul>

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
            <!-- Notifications Dropdown Menu -->

            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="far fa-bell"></i>
                    @if (Auth::user()->unreadNotifications->count())
                        <span
                            class="badge badge-warning navbar-badge">{{Auth::user()->unreadNotifications->count()}}</span>
                    @endif
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <span class="dropdown-item dropdown-header">15 Notifications</span>
                    <div class="dropdown-divider"></div>
                    @if (Auth::user()->notifications())
                        @foreach (Auth::user()->unreadNotifications as $notification)
                            @if (isset($notification->data['neworder']))

                                <a href="{{url('newOrderView/'.$notification->id.'/'.$notification->data['neworder']['id'])}}"
                                   class="dropdown-item">
                                    <i class="fas fa-envelope mr-2"></i> {{$notification->data['neworder']['title']}}
                                    {{-- {{url('newOrderView/'.['notificationId'=>$notification->id,'orderId'=>$notification->data['orderComplaint']['id']])}} --}}
                                    {{-- <span class="float-right text-muted text-sm">3 mins</span> --}}
                                </a>
                                <p class="text-gray ellipsis mb-0">
                                    &nbsp;&nbsp;{{$notification->data['neworder']['orderid']}}</p>
                                <div class="dropdown-divider"></div>
                            @endif
                            @if (isset($notification->data['canceleOrder']))
                                <a href="{{url('newOrderView/'.$notification->id.'/'.$notification->data['canceleOrder']['id'])}}"
                                   class="dropdown-item">
                                    <i class="fas fa-envelope mr-2"></i>{{$notification->data['canceleOrder']['title']}}
                                    <span class="float-right text-muted text-sm">3 mins</span>
                                </a>
                                <p class="text-gray ellipsis mb-0">
                                    &nbsp;&nbsp;{{$notification->data['canceleOrder']['orderid']}}</p>
                                <div class="dropdown-divider"></div>
                            @endif
                            @if (isset($notification->data['orderComplaint']))
                                {{-- href="{{url('orderNotificationview/'.$notification->id.'/'.$notification->data['neworder']['id'])}}"  --}}

                                <a href="{{url('complaintviewN/'.$notification->id.'/'.$notification->data['orderComplaint']['id'])}}"
                                   class="dropdown-item">
                                    <i class="fas fa-envelope mr-2"></i> {{$notification->data['orderComplaint']['title']}}
                                    <span class="float-right text-muted text-sm">3 mins</span>
                                </a>
                                <p class="text-gray ellipsis mb-0">
                                    @php
                                        if (strlen($notification->data['orderComplaint']['orderid']) > 20)
                                        echo substr($notification->data['orderComplaint']['orderid'], 0, 10) . '...';
                                        else {
                                          echo $notification->data['orderComplaint']['orderid'];
                                        }
                                    @endphp
                                </p>
                                {{-- <p class="text-gray ellipsis mb-0">&nbsp;&nbsp;{{$notification->data['orderComplaint']['orderid']}}</p> --}}
                                <div class="dropdown-divider"></div>
                            @endif
                        @endforeach
                    @endif


                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <i class="fas fa-users mr-2"></i> 8 friend requests
                        <span class="float-right text-muted text-sm">12 hours</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <i class="fas fa-file mr-2"></i> 3 new reports
                        <span class="float-right text-muted text-sm">2 days</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
                </div>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="far fa-user"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item dropdown-foote" href="{{ route('logout') }}"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fa fa-sign-out"></i> {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </li>
        </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="#" class="brand-link">
            <img src="{{asset('admin') }}/assets/logo.png" alt="AdminLTE Logo"
                 class="brand-image img-circle elevation-3"
                 style="opacity: .8">
            <span class="brand-text font-weight-light"> {{ env('APP_NAME') }} </span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="{{asset('admin') }}/assets/logo.png" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <a href="{{ url('/') }}" class="d-block"> {{ \Auth::user()->username }} </a>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">

                    <li class="nav-item has-treeview">
                        <a href="{{ route('admin/dashboard') }}"
                           class="nav-link {{ (request()->is('admin/dashboard')) ? 'active' : '' }}">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Dashboard
                            </p>
                        </a>
                    </li>
                    @if(auth()->user()->can('stores') || auth()->user()->can('create-store'))
                        <li class="nav-item has-treeview {{ (request()->is('stores') || request()->is('new-store')) ? 'menu-open' : '' }}">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-store-alt"></i>
                                <p>
                                    Manage Restuarant
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                @can('stores')
                                    <li class="nav-item">
                                        <a href="{{ route('stores') }}"
                                           class="nav-link {{ (request()->is('stores')) ? 'active' : '' }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p> All Restuarants </p>
                                        </a>
                                    </li>
                                @endcan
                                @can('create-store')
                                    <li class="nav-item">
                                        <a href="{{ route('new-store') }}"
                                           class="nav-link {{ (request()->is('new-store')) ? 'active' : '' }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p> Add Restuarant </p>
                                        </a>
                                    </li>
                                @endcan
                            </ul>
                        </li>
                    @endif

                    @if(auth()->user()->can('categories') || auth()->user()->can('create-category'))
                        <li class="nav-item has-treeview {{ (request()->is('categories') || request()->is('new-category')) ? 'menu-open' : '' }}">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-list"></i>
                                <p>
                                    Product Categories
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                @can('categories')
                                    <li class="nav-item">
                                        <a href="{{ url('/categories') }}"
                                           class="nav-link {{ (request()->is('categories')) ? 'active' : '' }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p> All Categories </p>
                                        </a>
                                    </li>
                                @endcan
                                @can('create-category')
                                    <li class="nav-item">
                                        <a href="{{ url('/new-category') }}"
                                           class="nav-link {{ (request()->is('new-category')) ? 'active' : '' }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Add Category </p>
                                        </a>
                                    </li>
                                @endcan
                            </ul>
                        </li>
                    @endif

                    @if(auth()->user()->can('products') || auth()->user()->can('create-product'))
                        <li class="nav-item has-treeview {{ (request()->is('products') || request()->is('new-product')) ? 'menu-open' : '' }}">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-list-alt"></i>
                                <p>
                                    Products
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                @can('products')
                                    <li class="nav-item">
                                        <a href="{{ url('/products') }}"
                                           class="nav-link {{ (request()->is('products')) ? 'active' : '' }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p> All Products </p>
                                        </a>
                                    </li>
                                @endcan
                                @can('create-product')
                                    <li class="nav-item">
                                        <a href="{{ url('/new-product') }}"
                                           class="nav-link {{ (request()->is('new-product')) ? 'active' : '' }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Add Product </p>
                                        </a>
                                    </li>
                                @endcan
                            </ul>
                        </li>
                    @endif

                    @can('recieve-orders')
                        <li class="nav-item {{ (request()->is('recieve-orders')) ? 'menu-open' : '' }}">
                            <a href="{{ route('recieve-orders') }}"
                               class="nav-link {{ (request()->is('recieve-orders')) ? 'active' : '' }}">
                                <i class="fa fa-shopping-cart nav-icon"></i>
                                <p>
                                    Recieved Orders
                                </p>
                            </a>
                        </li>
                    @endcan


                    @can('manage-orders')
                        <li class="nav-item {{ (request()->is('manage-orders')) ? 'menu-open' : '' }}">
                            <a href="{{ route('manage-orders') }}"
                               class="nav-link {{ (request()->is('manage-orders')) ? 'active' : '' }}">
                                <i class="fa fa-tasks nav-icon"></i>
                                <p>
                                    Manage Orders
                                </p>
                            </a>
                        </li>
                    @endcan

                    @can('manage-orders')
                        <li class="nav-item {{ (request()->is('assign-orders')) ? 'menu-open' : '' }}">
                            <a href="{{ route('assign-orders') }}"
                               class="nav-link {{ (request()->is('assign-orders')) ? 'active' : '' }}">
                                <i class="fa fa-circle nav-icon"></i>
                                <p>
                                    Assign To
                                </p>
                            </a>
                        </li>
                    @endcan

                    @can('assigned-orders')
                        <li class="nav-item {{ (request()->is('assigned-orders')) ? 'menu-open' : '' }}">
                            <a href="{{ route('assigned-orders') }}"
                               class="nav-link {{ (request()->is('assigned-orders')) ? 'active' : '' }}">
                                <i class="fa fa-circle nav-icon"></i>
                                <p>
                                    Assigned Order
                                </p>
                            </a>
                        </li>
                    @endcan
                    @can('pickup-orders')
                        <li class="nav-item {{ (request()->is('pickup-orders')) ? 'menu-open' : '' }}">
                            <a href="{{ route('pickup-orders') }}"
                               class="nav-link {{ (request()->is('pickup-orders')) ? 'active' : '' }}">
                                <i class="fa fa-circle nav-icon"></i>
                                <p>
                                    Pickup Order
                                </p>
                            </a>
                        </li>
                    @endcan

                    @can('history-orders')
                        <li class="nav-item {{ (request()->is('history-orders')) ? 'menu-open' : '' }}">
                            <a href="{{ route('history-orders') }}"
                               class="nav-link {{ (request()->is('history-orders')) ? 'active' : '' }}">
                                <i class="fa fa-circle nav-icon"></i>
                                <p>
                                    Order History
                                </p>
                            </a>
                        </li>
                    @endcan
                    {{-- @dd(auth()->user()->can('complaint-orders')) --}}
                    @can('complaint-orders')
                        <li class="nav-item {{ (request()->is('complaint-orders')) ? 'menu-open' : '' }}">
                            <a href="{{ route('complaint-orders') }}"
                               class="nav-link {{ (request()->is('complaint-orders')) ? 'active' : '' }}">
                                <i class="fas fa-envelope mr-2"></i>
                                <p>
                                    Complaint
                                </p>
                            </a>
                        </li>
                    @endcan

                    @if(auth()->user()->can('coupon') || auth()->user()->can('new-coupon'))
                        <li class="nav-item has-treeview {{ (request()->is('coupon') || request()->is('new-coupon')) ? 'menu-open' : '' }}">
                            <a href="#" class="nav-link">
                                <i class="fa fa-gift" aria-hidden="true"></i>
                                <p>
                                    Coupon

                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                @can('coupon')
                                    <li class="nav-item">
                                        <a href="{{ route('coupon') }}"
                                           class="nav-link {{ (request()->is('coupon')) ? 'active' : '' }}">
                                            <i class="fa fa-gift" aria-hidden="true"></i>
                                            <p> All Coupn </p>
                                        </a>
                                    </li>
                                @endcan
                                @can('new-coupon')
                                    <li class="nav-item">
                                        <a href="{{ route('create-coupon') }}"
                                           class="nav-link {{ (request()->is('new-coupon')) ? 'active' : '' }}">
                                            <i class="fa fa-gift" aria-hidden="true"></i>
                                            <p>Add Coupon </p>
                                        </a>
                                    </li>
                                @endcan
                            </ul>
                        </li>
                    @endif
                    {{-- @dd(auth()->user()->can('complaint-orders')) --}}
                    @can('customer')
                        <li class="nav-item">
                            <a href="{{ route('customer') }}"
                               class="nav-link {{ (request()->is('customer')) ? 'active' : '' }}">
                                <i class="nav-icon fas fa-users"></i>
                                <p> All Cutomer </p>
                            </a>
                        </li>
                    @endcan

                    @if(auth()->user()->can('employees') || auth()->user()->can('new-employee'))
                        <li class="nav-item has-treeview {{ (request()->is('employees') || request()->is('new-employee')) ? 'menu-open' : '' }}">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-users"></i>
                                <p>
                                    Employees
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                @can('employees')
                                    <li class="nav-item">
                                        <a href="{{ route('employees') }}"
                                           class="nav-link {{ (request()->is('employees')) ? 'active' : '' }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p> All Employees </p>
                                        </a>
                                    </li>
                                @endcan
                                @can('new-employee')
                                    <li class="nav-item">
                                        <a href="{{ route('new-employee') }}"
                                           class="nav-link {{ (request()->is('new-employee')) ? 'active' : '' }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Add Employee </p>
                                        </a>
                                    </li>
                                @endcan
                            </ul>
                        </li>
                    @endif

                    @if(auth()->user()->can('riders') || auth()->user()->can('new-rider'))
                        <li class="nav-item has-treeview {{ (request()->is('riders') || request()->is('new-rider')) ? 'menu-open' : '' }}">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fa fa-motorcycle"></i>
                                <p>
                                    Rider
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                @can('riders')
                                    <li class="nav-item">
                                        <a href="{{ route('riders') }}"
                                           class="nav-link {{ (request()->is('riders')) ? 'active' : '' }}">
                                            <i class="fa fa fa-motorcycle nav-icon"></i>
                                            <p> All Riders </p>
                                        </a>
                                    </li>
                                @endcan
                                @can('new-rider')
                                    <li class="nav-item">
                                        <a href="{{ route('new-rider') }}"
                                           class="nav-link {{ (request()->is('new-rider')) ? 'active' : '' }}">
                                            <i class="fa fa fa-motorcycle nav-icon"></i>
                                            <p>Add Rider </p>
                                        </a>
                                    </li>
                                @endcan
                            </ul>
                        </li>
                    @endif

                    @if(auth()->user()->can('home-delivery') || auth()->user()->can('pickup'))
                        <li class="nav-item has-treeview {{ (request()->is('pickup') || request()->is('home-delivery')) ? 'menu-open' : '' }}">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-store-alt"></i>
                                <p>
                                    Kitchen
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                @can('home-delivery')
                                    <li class="nav-item">
                                        <a href="{{ route('home-delivery') }}"
                                           class="nav-link {{ (request()->is('home-delivery')) ? 'active' : '' }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p> Home Delivery </p>
                                        </a>
                                    </li>
                                @endcan
                                @can('pickup')
                                    <li class="nav-item">
                                        <a href="{{ route('pickup') }}"
                                           class="nav-link {{ (request()->is('pickup')) ? 'active' : '' }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p> Take Away </p>
                                        </a>
                                    </li>
                                @endcan
                            </ul>
                        </li>
                    @endif
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">@yield('title')</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                            <li class="breadcrumb-item active">@yield('title')</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>

                        <strong>{{ $message }}</strong>
                    </div>
                @endif
                @if ($message = Session::get('fail'))
                    <div class="alert alert-danger alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>

                        <strong>{{ $message }}</strong>
                    </div>
                @endif
                @yield('content')
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
        <strong>Copyright &copy; 2019-2020 <a href="{{ url('/') }}">Food Ordering </a>.</strong>
        All rights reserved.
        <div class="float-right d-none d-sm-inline-block">
            <b></b>
        </div>
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
</div>
<!-- ./wrapper
<script src="{{ asset('admin')}}/plugins/jquery/jquery.min.js"></script> -->
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('admin')}}/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ asset('admin')}}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="{{ asset('admin')}}/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="{{ asset('admin')}}/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap
<script src="{{ asset('admin')}}/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="{{ asset('admin')}}/plugins/jqvmap/maps/jquery.vmap.usa.js"></script> -->
<!-- jQuery Knob Chart -->
<script src="{{ asset('admin')}}/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="{{ asset('admin')}}/plugins/moment/moment.min.js"></script>
<script src="{{ asset('admin')}}/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('admin')}}/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="{{ asset('admin')}}/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('admin')}}/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="{{ asset('admin')}}/dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes)
<script src="{{ asset('admin')}}/dist/js/pages/dashboard.js"></script> -->
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('admin')}}/dist/js/demo.js"></script>
<!-- SweetAlert2 -->
<script src="{{ asset('admin')}}/plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Toastr -->
<script src="{{ asset('admin')}}/plugins/toastr/toastr.min.js"></script>

<script type="text/javascript">

    $('#loader').fadeOut(1000);

</script>
<!-- The core Firebase JS SDK is always required and must be listed first -->
<!-- The core Firebase JS SDK is always required and must be listed first -->
<script src="https://www.gstatic.com/firebasejs/7.6.2/firebase-app.js"></script>

<!-- TODO: Add SDKs for Firebase products that you want to use
     https://firebase.google.com/docs/web/setup#available-libraries -->
<script src="https://www.gstatic.com/firebasejs/7.6.2/firebase-analytics.js"></script>

<script>
    // Your web app's Firebase configuration
    var firebaseConfig = {
        apiKey: "AIzaSyBxuXLCDTBz65cfBwAVXl_N6-VBoIUbBNM",
        authDomain: "food-c4fc7.firebaseapp.com",
        databaseURL: "https://food-c4fc7.firebaseio.com",
        projectId: "food-c4fc7",
        storageBucket: "food-c4fc7.appspot.com",
        messagingSenderId: "448514494340",
        appId: "1:448514494340:web:a0b9e46c58a90d837817d1",
        measurementId: "G-765RTT8JHX"
    };
    // Initialize Firebase
    firebase.initializeApp(firebaseConfig);
    firebase.analytics();
</script>
</body>
</html>
