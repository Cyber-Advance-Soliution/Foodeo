<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title> Food Ordering | @yield('title') </title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="{{ asset('admin')}}/plugins/fontawesome-free/css/all.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	<!-- Tempusdominus Bbootstrap 4 -->
	<link rel="stylesheet" href="{{ asset('admin')}}/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
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
		.tbl-product-img{
			width: 50px;
			height: 50px;
		}
		.error-help-block{
			color:red !important;
		}
	
		#loader {
		  display: none;
		  position: fixed;
		  top: 0;
		  left: 0;
		  right: 0;
		  bottom: 0;
		  width: 100%;
		  background: rgba(0,0,0,0.75) url({{asset('admin') }}/assets/logo.png) no-repeat center center;
		  z-index: 10000;
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
			  <i class="far fa-user"></i>
			</a>
			<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
			  <div class="dropdown-divider"></div>
				<a class="dropdown-item dropdown-foote" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
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
      <img src="{{asset('admin') }}/assets/logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Food Ordering</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
			<img src="{{asset('admin') }}/assets/logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
        </div>
        <div class="info">
          <a href="#" class="d-block"> {{ \Auth::user()->username }} </a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
			<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        
				<li class="nav-item has-treeview">
					<a href="{{ route('staff/dashboard') }}" class="nav-link {{ (request()->is('staff/dashboard')) ? 'active' : '' }}">
					  <i class="nav-icon fas fa-tachometer-alt"></i>
					  <p>
						Dashboard
					  </p>
					</a>
				</li>
				@if(auth()->user()->can('stores') || auth()->user()->can('create store'))
					<li class="nav-item has-treeview {{ (request()->is('stores') || request()->is('new-store')) ? 'menu-open' : '' }}">
						<a href="#" class="nav-link">
							<i class="nav-icon fas fa-store-alt"></i>
							<p>
								Store
								<i class="right fas fa-angle-left"></i>
							</p>
						</a>
						<ul class="nav nav-treeview">
							@can('stores')
								<li class="nav-item">
									<a href="{{ route('stores') }}" class="nav-link {{ (request()->is('stores')) ? 'active' : '' }}">
										<i class="far fa-circle nav-icon"></i>
										<p> All Stores </p>
									</a>
								</li>
							@endcan
							@can('create store')
								<li class="nav-item">
									<a href="{{ route('new-store') }}" class="nav-link {{ (request()->is('new-store')) ? 'active' : '' }}">
										<i class="far fa-circle nav-icon"></i>
										<p>Add New</p>
									</a>
								</li>
							@endcan
						</ul>
					</li>
				@endif
				
				@if(auth()->user()->can('categories') || auth()->user()->can('create category'))
					<li class="nav-item has-treeview {{ (request()->is('categories') || request()->is('new-category')) ? 'menu-open' : '' }}">
						<a href="#" class="nav-link">
							<i class="nav-icon fas fa-list"></i>
							<p>
								Categories
								<i class="right fas fa-angle-left"></i>
							</p>
						</a>
						<ul class="nav nav-treeview">
							@can('categories')
								<li class="nav-item">
									<a href="{{ url('/categories') }}" class="nav-link {{ (request()->is('categories')) ? 'active' : '' }}">
										<i class="far fa-circle nav-icon"></i>
										<p> All Categories </p>
									</a>
								</li>
							@endcan
							@can('create category')
								<li class="nav-item">
									<a href="{{ url('/new-category') }}" class="nav-link {{ (request()->is('new-category')) ? 'active' : '' }}">
										<i class="far fa-circle nav-icon"></i>
										<p>Add New</p>
									</a>
								</li>
							@endcan
						</ul>
					</li>
				@endif
				
				@if(auth()->user()->can('products') || auth()->user()->can('create product'))
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
									<a href="{{ url('/products') }}" class="nav-link {{ (request()->is('products')) ? 'active' : '' }}">
										<i class="far fa-circle nav-icon"></i>
										<p> All Products </p>
									</a>
								</li>
							@endcan
							@can('create product')
								<li class="nav-item">
									<a href="{{ url('/new-product') }}" class="nav-link {{ (request()->is('new-product')) ? 'active' : '' }}">
										<i class="far fa-circle nav-icon"></i>
										<p>Add New</p>
									</a>
								</li>
							@endcan
						</ul>
					</li>
				@endif
				
				@can('recieve orders')
					<li class="nav-item {{ (request()->is('recieve-orders')) ? 'menu-open' : '' }}">
						<a href="{{ route('recieve-orders') }}" class="nav-link {{ (request()->is('recieve-orders')) ? 'active' : '' }}">
						<i class="far fa-circle nav-icon"></i>
						<p>
							Recieved Orders
						</p>
						</a>
					</li>
				@endcan
				@can('manage orders')
					<li class="nav-item {{ (request()->is('manage-orders')) ? 'menu-open' : '' }}">
						<a href="{{ route('manage-orders') }}" class="nav-link {{ (request()->is('manage-orders')) ? 'active' : '' }}">
						<i class="fa fa-tasks nav-icon"></i>
						<p>
							Manage Orders
						</p>
						</a>
					</li>
				@endcan
				
				@if(auth()->user()->can('employees') || auth()->user()->can('new employee'))
					<li class="nav-item has-treeview {{ (request()->is('products') || request()->is('new-product')) ? 'menu-open' : '' }}">
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
									<a href="{{ route('employees') }}" class="nav-link {{ (request()->is('employees')) ? 'active' : '' }}">
										<i class="far fa-circle nav-icon"></i>
										<p> All Employees </p>
									</a>
								</li>
							@endcan
							@can('new employee')
								<li class="nav-item">
									<a href="{{ route('new-employee') }}" class="nav-link {{ (request()->is('new-employee')) ? 'active' : '' }}">
										<i class="far fa-circle nav-icon"></i>
										<p>Add Employee </p>
									</a>
								</li>
							@endcan
						</ul>
					</li>
				@endif
				
				@can('orders queue')
					<li class="nav-item {{ (request()->is('orders-queue')) ? 'menu-open' : '' }}">
						<a href="{{ route('orders-queue') }}" class="nav-link {{ (request()->is('orders-queue')) ? 'active' : '' }}">
						<i class="far fa-circle nav-icon"></i>
						<p>
							Orders Queue
						</p>
						</a>
					</li>	
				@endcan
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
              <li class="breadcrumb-item"><a href="#">Home</a></li>
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
	
	$(function() {
		const Toast = Swal.mixin({
			toast: true,
			position: 'top-end',
			showConfirmButton: false,
			timer: 3000
		});

		$('.swalDefaultSuccess').click(function() {
			Toast.fire({
				type: 'success',
				title: 'Success.'
			})
		});
		$('.swalDefaultInfo').click(function() {
			Toast.fire({
				type: 'info',
				title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
			})
		});
		
		$('.swalDefaultError').click(function() {
			Toast.fire({
				type: 'error',
				title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
			})
		});
		
		$('.swalDefaultWarning').click(function() {
			Toast.fire({
				type: 'warning',
				title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
			})
		});
    
	});

</script>


</body>
</html>
