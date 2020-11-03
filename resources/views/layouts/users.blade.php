<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>iCREDENCE Affiliate Portal</title>
        <link href="{{ asset('admins2/fonts/css/all.min.css') }}" rel="stylesheet">
          <link href="{{ asset('admins2/css/app.css') }}" rel="stylesheet">
        <!-- Styles -->
  <link rel="stylesheet" href="{{ asset('admins2/plugins/datatables-bs4/css/dataTables.bootstrap4.css') }}">
  
  <link rel="stylesheet" href="{{ asset('admins2/dist/css/adminlte.min.css') }}">
     
  <link rel="stylesheet" href="{{ asset('admins2/plugins/daterangepicker/daterangepicker.css') }}">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="{{ asset('admins2/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="{{ asset('admins2/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css') }}">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="{{ asset('admins2/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
  <!-- Select2 -->
  <link rel="stylesheet" href="{{ asset('admins2/plugins/select2/css/select2.min.css') }}">
  <link rel="stylesheet" href="{{ asset('admins2/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
  <!-- Bootstrap4 Duallistbox -->
  <link rel="stylesheet" href="{{ asset('admins2/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css')}}">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ asset('admins2/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- IonIcons -->
  <!-- <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  Theme style -->
   <style>
     p:hover{
       color:red !important;
     }
   </style>
</head>
    
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav navbar">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
      <!-- <li class="nav-item d-none d-sm-inline-block">
      <a class="text-success"><?php
                               
                               $time = date("H");
                              
                               $timezone = date("e");
                              
                               if ($time < "12") {
                                   echo "Good morning";
                               } else
                             
                               if ($time >= "12" && $time < "17") {
                                   echo "Good afternoon";
                               } else
                              
                               if ($time >= "17" && $time < "19") {
                                   echo "Good evening";
                               } else
                              
                               if ($time >= "19") {
                                   echo "Good night";
                               }
                               ?> ,
                               <span>{{Auth::user()->profile->first_name ?? Auth::user()->username}} {{Auth::user()->profile->last_name ?? ''}}</span>
                           </a>
      </li> -->
      <!--
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{route('admin')}}" class="nav-link">Create Project</a>
      </li> -->
    </ul>
    <div class="navbar-custom-menu pull-right">
        <ul class="nav navbar-nav">
		  
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a class="control-btn" href="#" data-toggle="control-sidebar"><i class="ti-settings"></i></a>
          </li>			  
          <!-- Messages -->
          
		  <!-- User Account-->
              
       
  </nav>
  <!-- /.navbar -->
 <!-- Left side column. contains the logo and sidebar -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color:#3A3A80;color:white;">
    <!-- Brand Logo -->
    <!-- <a href="index.php" class="brand-link">
      <img src="" alt="dp" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">{{ Auth::user()->username }}</span>
    </a> -->

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
        @if(Auth::user()->profile->avatar != null)
        <img class="w-40 rounded-circle" height="40" src="{{asset('/storage/profile/'.Auth::user()->profile->avatar)}}" alt="dp">
        @endif
        @if(Auth::user()->profile->avatar = null)
        <img class="w-40 rounded-circle" height="40" src="/images/default.png" alt="dp">
        @endif
      </div>
        <div class="info">
          <a href="{{route('profile',Auth::user()->id)}}" title="user profile" class="d-block">{{ Auth::user()->username }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
              
        <li class="nav-item active">
          <a href="{{route('home')}}" class="nav-link">
            <i class="fas fa-th text-white"></i>
            <p style="color:white;">Dashboard</p>          
          </a>          
        </li>
        
        <li class="nav-item">
        <a href="{{route('profile', Auth::user()->profile)}}" class="nav-link">
        <i class="fas fa-file text-white"></i>
        <p style="color:white;"> Profile</p>
      </a>
    </li> 

    <li class="nav-item">
        <a href="{{route('create-note')}}" class="nav-link">
        <i class="fas fa-book text-white"></i>
        <p style="color:white;"> Add Note</p>
      </a>
    </li> 

    <li class="nav-item">
        <a href="{{route('products')}}" class="nav-link">
        <i class="fab fa-product-hunt text-white"></i>
        <p style="color:white;"> Products</p>
      </a>
    </li> 

    <!-- <li class="nav-item">
        <a href="{{route('schools')}}" class="nav-link">
        <i class="fas fa-school text-white"></i>
        <p style="color:white;">Schools</p>
      </a>
    </li>  -->

 <li class="nav-item">
              <a class="dropdown-item nav-link" href="{{ route('logout') }}"
                 onclick="event.preventDefault();
                 document.getElementById('logout-form').submit();">
                <i class="fas fa-sign-out-alt text-white"></i> 
                <p style="color:white;">Sign out</p>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
                </form>
                </a>
              </li>          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
  <br>
<div class="container">
<div class="row">
<div class="col-md-3"></div>
<div class="col-md-6"> 
  @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Success!</strong> {{session('success')}}
      </div>
      @endif

      @if ($message = Session::get('info'))
      <div class="alert alert-info">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Info!</strong> {{session('info')}}
      </div>
      @endif

      @if ($message = Session::get('warning'))
      <div class="alert alert-warning">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Warning!</strong> {{session('warning')}}
      </div>
      @endif

      @if ($errors->any())
      <div class="alert alert-danger">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Whoops!</strong> {{session('warning')}}<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div>
      @endif
      </div>
      <div class="col-md-3"></div>
      </div>
      </div>
    @yield('content')
<!-- jQuery -->
 
<script src="/admins/assets/vendor_components/jquery-3.3.1/jquery-3.3.1.js"></script>
	
	<script src="/admins/assets/vendor_components/screenfull/screenfull.js"></script>

	<script src="/admins/assets/vendor_components/jquery-ui/jquery-ui.js"></script>
	
	<script src="/admins/assets/vendor_components/popper/dist/popper.min.js"></script>
	
	<script src="/admins/assets/vendor_components/bootstrap/dist/js/bootstrap.js"></script>	
	
	<script src="/admins/assets/vendor_components/jquery-slimscroll/jquery.slimscroll.js"></script>
	
	<script src="/admins/assets/vendor_components/fastclick/lib/fastclick.js"></script>
	
	<script src="/admins/assets/vendor_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
	
	<script src="/admins/assets/vendor_components/chart.js-master/Chart.bundle.js"></script>
	<script src="/admins/assets/vendor_components/chart.js-master/utils.js"></script>
	
	<script src="/admins/assets/vendor_plugins/weather-icons/WeatherIcon.js"></script>
 
  <script src="/admins/js/template.js"></script>
  <script src="https://checkout.stripe.com/checkout.js"></script>
  <script src="https://js.stripe.com/v3/"></script>

  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js"></script>

  <script>
      $(document).ready( function () {
    $('#myTable').DataTable();
} );
  </script>
 <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
 
<script src="{{ asset('admins2/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('admins2/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- DataTables -->
<script src="{{ asset('admins2/plugins/datatables/jquery.dataTables.js') }}"></script>
<script src="{{ asset('admins2/plugins/datatables-bs4/js/dataTables.bootstrap4.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('admins2/dist/js/adminlte.min.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="admins2/dist/js/demo.js"></script>
 <!-- AdminLTE -->
 <script src="{{ asset('admins2/dist/js/adminlte.js') }}"></script> 
<script src="{{ asset('admins2/plugins/select2/js/select2.full.min.js') }}"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="{{ asset('admins2/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js') }}"></script>
<!-- InputMask -->
<script src="{{ asset('admins2/plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('admins2/plugins/inputmask/min/jquery.inputmask.bundle.min.js') }}"></script>
<!-- date-range-picker -->
<script src="{{ asset('admins2/plugins/daterangepicker/daterangepicker.js') }}"></script>
<!-- bootstrap color picker -->
<script src="{{ asset('admins2/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js') }}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('admins2/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<!-- Bootstrap Switch -->
<script src="{{ asset('admins2/plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="{{ asset('admins2/plugins/chart.js/Chart.min.js') }}"></script>
<script src="{{ asset('admins2/dist/js/demo.js') }}"></script>
<script src="{{ asset('admins2/dist/js/pages/dashboard3.js') }}"></script>

    </body>
</html>
