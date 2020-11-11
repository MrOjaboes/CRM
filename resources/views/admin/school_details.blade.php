@extends('layouts.header')
@section('content')


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>School Details</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin')}}">Home</a></li>
              <li class="breadcrumb-item active">School Details</li>
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
          
        <form action="" method="" enctype="">
            @csrf
             
            <div class="form-group">
                <label for="content">School Name</label>
            <input type="text" name="name" disabled value="{{$school->name}}" class="form-control">
            @error('name')
            <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
            </span>
            @enderror
            </div> 

            <div class="form-group">
                <label for="content"> Contact Email</label>
            <input type="email" name="email" disabled value="{{$school->email}}" class="form-control">
            @error('email')
            <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
            </span>
            @enderror
            </div> 
            <div class="form-group">
                <label for="content">Contact Person</label>
            <input type="text" name="contact_person" disabled value="{{$school->contact_person}}" class="form-control">
            @error('contact_person')
            <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
            </span>
            @enderror
            </div> 
            <div class="form-group">
                <label for="content">Added By</label>
            <input type="text" name="contact_person" disabled value="{{$school->added_by}}" class="form-control">
            @error('contact_person')
            <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
            </span>
            @enderror
            </div>   

            <div class="form-group">
                <label for="content">Phone</label>
            <input type="number" name="phone" value="{{$school->phone}}" disabled class="form-control">
            @error('phone')
            <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
            </span>
            @enderror
            </div>   
            <div class="form-group">
                <label for="content">Address</label>
            <textarea name="address" class="form-control" disabled value="{{$school->address}}" placeholder="Location Of School">{{$school->address}}</textarea>
            @error('address')
            <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
            </span>
            @enderror
            </div>  
            </form>        
             @if($school->completed ==1)
             <h3 class="text-center">Closed Deal Details</h3>
             <table class="table">
             <thead>
             <tr>
             <th>No. Of Users</th>
             <th>Package</th>
             <th>Total Amount</th>
             <th>Date</th>
             </tr>
             </thead>
             <tbody>
             @foreach($deals as $deal)
             <tr>
             <td>{{$deal->users}}</td>
             <td>{{$deal->package}}</td>
             <td>&#8358; {{$deal->package_amount}}</td>
             <td>{{$deal->created_at}}</td>
             <td> 
             @if($deal->paid == 0)
             <form action="{{route('pay-affiliate', $school->id)}}" method="POST">
                                      @csrf
                                      @method('PUT')
                                      <button type="submit" class="btn btn-default" style="background-color:#3A3A80;color:white;">Pay</button>
                  </form>                  
                  @endif
                  @if($deal->paid == 1)
                   <span class="btn btn-warning">Paid</span>
                  @endif
                </td>
             </tr>
             @endforeach
             </tbody>
             </table>
             @endif
             <a href="{{route('admin.schools')}}" type="button" class="btn btn-warning"><i class="fas fa-arrow-left"></i> Back</a>
       
           
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