@extends('layouts.header')
@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Registered Users <span class="badge badge-warning">{{$users->count()}}</span></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin')}}">Home</a></li>
              <li class="breadcrumb-item active">Registered Users</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
          </div>
        </div>
        <div class="card-body p-0">
         <div class="row">
           <div class="col-md-1"></div>
           <div class="col-md-10">
           <div style="overflow-y:scroll;height:200px;" class="table-responsive">
        <table class="table">
            <thead>
                        <tr>
                          <th scope="col">Name</th>                           
                          <th scope="col">UserName</th>                          
                          <th scope="col">email</th>                           
                          <th width="8%">Joined</th>
                          <th scope="col">Action</th>
                        
                        </tr>
                      </thead>
                      @foreach($users as $user)
                      <tbody>
                        <tr>
                          <td>{{$user->profile->full_name ?? '-'}}</td>                           
                            <td><a href="{{route('user-product',$user->id)}}">{{$user->username ?? '-'}}</a></td>                             
                             <td>{{$user->email ?? '-'}}</td>                       
                              
                             <td>{{ \Carbon\Carbon::parse($user->created_at)->format('d/m/Y')}}</td>
                           
                             <td>
                                <div class="dropdown">
                                    <button style="background-color:#3A3A80;color:white;" class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                      Actions
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                      @if(Auth::check() AND Auth::user()->user_type == 1 || Auth::user()->user_type == 2)
                                    <a class="dropdown-item btn btn-info" href="{{route('edit-user', $user->profile)}}" title="Affiliate's Details">Details</a>
                                    <a class="dropdown-item btn btn-secondary" href="{{route('mail-user', $user->profile)}}">Send Mail</a>
                                    <form action="{{route('admin-delete', $user->id)}}" method="POST">
                                      @csrf
                                      @method('DELETE')
                                      <button type="submit" class="btn btn-default">Delete</button>
                                    </form>
                                    @endif
                                    @if(Auth::check() AND Auth::user()->user_type == 1 || Auth::user()->user_type == 3)
                                      <!--<a class="dropdown-item" href="{{route('view-user-note', $user->profile)}}">View Note</a>-->
                                      @endif
                                    </div>
                                  </div>
                             </td>
                        </tr>
                      </tbody>
                       
                      @endforeach 
                      </table>
                      </div>
        </div>
           </div>
           <div class="col-md-1"></div>
         </div>
        
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
       

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