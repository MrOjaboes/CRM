@extends('layouts.header')
@section('content')  
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit User</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin')}}">Home</a></li>
              <li class="breadcrumb-item active">Edit User</li>
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
            <form action="{{route('deductwallet', $user->id)}}" method="POST">
                @csrf
                @method('PUT')
              <div class="content-details show">
                <div class="card">
                  <div class="card-body card-block">
                    <div class="form-group">
                      <label class=" form-control-label">Amount</label>
                      <div class="input-group">
                        <div class="input-group-addon"><i class="fa fa-money"></i></div>
                        <input class="form-control" type="number" name="amount">
                      </div>
                      <small class="form-text text-muted">ex. ₦1000</small>
                    </div>
    
                  <div>
                    <button type="submit" class="btn btn-outline-success">Deduct</button>
                  </div>
                </div>
              </div><!-- /.content-details -->
              </div>
            </form>
    
            <form action="{{route('addwallet', $user->id)}}" method="POST">
                @csrf
                @method('PUT')
              <div class="content-details show">
                <div class="card">
                  <div class="card-body card-block">
                    <div class="form-group">
                      <label class=" form-control-label">Amount</label>
                      <div class="input-group">
                        <div class="input-group-addon"><i class="fa fa-money"></i></div>
                        <input class="form-control" type="number" name="amount">
                      </div>
                      <small class="form-text text-muted">ex. ₦1000</small>
                    </div>
    
                  <div>
                    <button type="submit" class="btn btn-outline-success">Add</button>
                  </div>
                </div>
              </div><!-- /.content-details -->
            </form>
        
            </div>
           
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
 
@endsection()