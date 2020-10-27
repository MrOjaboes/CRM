@extends('layouts.users')
@section('content')


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>User Profile</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
              <li class="breadcrumb-item active">User Profile</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
        <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title"></h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
              <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times label-danger"></i></button>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
          <div class="row">
          <div class="col-md-2"></div>
          <div class="col-md-8">
          <div class="card card-default">
          <div class="card-header">
                        <h3 class="card-title">User Profile</h3>
                    </div>
                    <div class="card-body">
                    @if(Auth::user()->profile->avatar != null)
        <img class="w-40 rounded-circle" height="40" src="{{asset('/storage/profile/'.Auth::user()->profile->avatar)}}" alt="dp">
        @endif
        @if(Auth::user()->profile->avatar = null)
        <img class="w-40 rounded-circle" height="40" src="/images/default.png" alt="dp">
        @endif<br>
           <span>Hello</span>
            <h4 class="mb-2">{{Auth::user()->username}}</h4>
            <p class="mb-1"> <span><i class="fa fa-phone mr-2 text-primary"></i></span>{{Auth::user()->profile->phone ?? ''}}</p>
                                <p class="mb-1"> <span><i class="fa fa-envelope mr-2 text-primary"></i></span>
                                    {{Auth::user()->email}}
                                </p>  
                                <ul class="card-profile__info list-group">
                            <li class="list-group-item">
                                <h5 class="text-dark mr-4">Address</h5>
                                <span class="text-muted">{{Auth::user()->profile->address ?? ''}}</span>
                            </li>
                            <li class="mb-1 list-item list-group-item">
                                <h5 class="text-dark mr-4">Bank Name</h5>
                            <span>{{Auth::user()->profile->bank ?? ''}}</span>
                            </li>
                            <li class="list-group-item">
                                <h5 class="text-dark mr-4">Account Number</h5>
                                <span>{{Auth::user()->profile->account_number ?? ''}}</span>
                            </li>
                        </ul>   
                        <br>
                        <div class="justify-content-centre">
                        @if ($profile->user->user_type == 1)
                        <a href="{{route('admin')}}" class="btn btn-info">Home</a>
                            @endif
                            @if ($profile->user->user_type == 2)
                        <a href="{{route('admin')}}" class="btn btn-info">Home</a>
                            @endif
                            @if ($profile->user->user_type == 3)
                        <a href="{{route('admin')}}" class="btn btn-info">Home</a>
                            @endif
                            
                            &nbsp;
                        <a href="{{route('edit-profile', Auth::user()->profile)}}"><button class="btn btn-primary">Edit Profile</button></a> 
                        </div>
                        </div>
                        </div>      
          </div>
           
          <div class="col-md-2"></div>    
            
            
        </div>
         
         </div><!-- /.container-fluid -->
       </section>
       <!-- /.content -->
     </div>
     <!-- /.content-wrapper -->  
   
     <!-- Control Sidebar -->
     <aside class="control-sidebar control-sidebar-dark">
       <!-- Control sidebar content goes here -->
     </aside>
     <!-- /.control-sidebar -->
   </div>
   <!-- ./wrapper -->
   
   <script src="{{ asset('admins2/plugins/jquery/jquery.min.js') }}"></script>
   <!-- Bootstrap -->
   <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
   <!-- AdminLTE -->
   <script src="{{ asset('admins2/dist/js/adminlte.js') }}"></script> 
   <script src="{{ asset('plugins/select2/js/select2.full.min.js') }}"></script>
   <!-- Bootstrap4 Duallistbox -->
   <script src="{{ asset('plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js') }}"></script>
   <!-- InputMask -->
   <script src="{{ asset('plugins/moment/moment.min.js') }}"></script>
   <script src="{{ asset('plugins/inputmask/min/jquery.inputmask.bundle.min.js') }}"></script>
   <!-- date-range-picker -->
   <script src="{{ asset('plugins/daterangepicker/daterangepicker.js') }}"></script>
   <!-- bootstrap color picker -->
   <script src="{{ asset('plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js') }}"></script>
   <!-- Tempusdominus Bootstrap 4 -->
   <script src="{{ asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
   <!-- Bootstrap Switch -->
   <script src="{{ asset('admins2/plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}"></script>
   
   <!-- OPTIONAL SCRIPTS -->
   <script src="{{ asset('plugins/chart.js/Chart.min.js') }}"></script>
   <script src="{{ asset('dist/js/demo.js') }}"></script>
   <script src="{{ asset('dist/js/pages/dashboard3.js') }}"></script>
    
   @endsection()