@extends('layouts.header')
@section('content')  
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 style="color:#cccccc;">User Products</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin')}}">Home</a></li>
              <li class="breadcrumb-item active"> User Products</li>
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
          <h4 class="card-title">Total No. Of Products <b class="btn btn-warning">{{$schools->count()}}</b></h4> <br><br>
         
          <div class="row">          
          <div class="col-md-3">
              <h4 style="color:#cccccc;">SchoolRevo</h4>   
             <ul class="list-group">
             @foreach($schools as $school)                 
             <li class="list-group-item">
             {{$school->name}}
             </li>             
                @endforeach
             </ul>           
                 
        
          </div>
          <div class="col-md-3">
          <h4 style="color:#cccccc;">Athr</h4> </div>
          <div class="col-md-3">
          <h4 style="color:#cccccc;">Naija Nofar</h4> 
          </div>
          <div class="col-md-3">
          <h4 style="color:#cccccc;">SchoolRevo</h4> 
          </div>
          </div>
         
            </div>
            
        </div>
        <a href="{{route('users')}}" class="btn btn-warning"><i class="fas fa-arrow-left"></i> Users</a>
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
 
@endsection()