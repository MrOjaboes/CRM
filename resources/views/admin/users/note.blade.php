@extends('layouts.header')
@section('content')


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>User Note</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin')}}">Home</a></li>
              <li class="breadcrumb-item active">User Note</li>
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
         
            <div class="media align-items-center mb-3">
                    <img class="mr-3 rounded-circle mr-0 mr-sm-3"
                    src="{{asset('/storage/profile/'.$user->profile->avatar)}}" width="55" height="55" alt="">
                    <div class="media-body">
                        <h4 class="mb-0">{{$user->username}}</h4>
                        <!-- <p class="mb-0">Max file size is 2mb
                        </p> -->
                    </div>
                </div>
            <div class="row">
              
              <div class="col-md-6">
                <ul class="list-group">
                <li class="list-group-item"><h5>Full Name</h5><span>{{$user->profile->full_name ?? ''}}</span></li>
                <li class="list-group-item"><h5>Email</h5><span>{{$user->profile->email ?? ''}}</span></li>
                <li class="list-group-item"><h5>Address</h5><span>{{$user->profile->address ?? ''}}</span></li>
                <li class="list-group-item"><h5>Phone</h5><span>{{$user->profile->phone ?? ''}}</span></li>
                <li class="list-group-item"><h5>Gender</h5><span>{{$user->profile->gender ?? ''}}</span></li>
                <li class="list-group-item"><h5>Next Of Kin</h5><span>{{$user->profile->next_of_kin ?? ''}}</span></li>
                <li class="list-group-item"><h5>Employment Status</h5><span>{{$user->profile->employment_status ?? ''}}</span></li>
                <li class="list-group-item"><h5>Marital Status</h5><span>{{$user->profile->marital_status ?? ''}}</span></li>
                <li class="list-group-item"><h5>Bank</h5><span>{{$user->profile->bank ?? ''}}</span></li>
                <li class="list-group-item"><h5>Account Name</h5><span>{{$user->profile->account_name ?? ''}}</span></li>
                <li class="list-group-item"><h5>Account Number</h5><span>{{$user->profile->account_number ?? ''}}</span></li>
                <li class="list-group-item"><h5>Account Type</h5><span>{{$user->profile->account_type ?? ''}}</span></li>
                </ul>
              
             
              </div>
              <div class="col-md-6"> 
                @foreach($notes as $note)
                <p class="text-muted">{{$note->content}} <b class="text-right">{{ \Carbon\Carbon::parse($note->created_at)->format('d/m/Y')}}</b></p>
                @endforeach
              </div>
            </div>
             
            <div class="form-group col-12">
              <a href="{{route('admin')}}" type="button" class="btn btn-success">Home</a>
                <!-- <button type="submit" class="btn btn-success pl-5 pr-5">Update</button> -->
            </div>
         
        </div>
    </div>
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
<!-- Bootstrap 4 -->
<script src="{{ asset('admins2/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- DataTables -->
<script src="{{ asset('admins2/plugins/datatables/jquery.dataTables.js') }}"></script>
<script src="{{ asset('admins2/plugins/datatables-bs4/js/dataTables.bootstrap4.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('admins2/dist/js/adminlte.min.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('admins2/dist/js/demo.js') }}"></script>
<!-- page script -->
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
    });
  });
</script>
@endsection