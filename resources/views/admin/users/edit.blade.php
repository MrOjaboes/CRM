@extends('layouts.header')
@section('content')


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>User Details</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin')}}">Home</a></li>
              <li class="breadcrumb-item active">User Details</li>
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
        <form action="" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="media align-items-center mb-3">
            @if($profile->avatar != null)
        <img class="mr-3 rounded-circle mr-0 mr-sm-3" height="40" src="{{asset('/storage/profile/'.$profile->avatar)}}" alt="dp">
        @endif
        @if($profile->avatar = null)
        <img class="mr-3 rounded-circle mr-0 mr-sm-3" height="40" src="/images/default.png" alt="dp">
        @endif
                    <div class="media-body">
                        <h4 class="mb-0">{{$profile->user->username}}</h4>
                        <!-- <p class="mb-0">Max file size is 2mb
                        </p> -->
                    </div>
                </div>
            <div class="row">
              
              <div class="col-md-6">

              <div class="form-group">
                <label for="first_name">Full Name</label>
            <input type="text" name="full_name" disabled   class="form-control" value="{{$profile->full_name ?? ''}}" autocomplete="first_name">
            </div>
            <div class="form-group">
                <label for="last_name">Email</label>
            <input type="text" name="last_name" id="last_name" class="form-control" value="{{$profile->email ?? ''}}" disabled autocomplete="last_name">
            </div>

            <div class="form-group">
                <label for="address">Contact Address</label>
            <textarea type="text" disabled name="address" id="address" class="form-control" value="" autocomplete="address">{{$profile->address ?? ''}}</textarea>
            </div>

            <div class="form-group">
                <label for="phone">Phone</label>
            <input type="number" disabled name="phone" id="phone" class="form-control" value="{{$profile->phone ?? ''}}" autocomplete="phone">
            </div>

            <div class="form-group">
                <label for="bank_name">Next Of Kin</label>
            <input type="text" disabled name="bank" id="bank_name" class="form-control" value="{{$profile->next_of_kin ?? ''}}" autocomplete="bank_name">
            </div>

            <div class="form-group">
                <label for="account_number"> Gender</label>
            <input type="text" disabled name="account_number" id="account_number" class="form-control" value="{{$profile->gender ?? ''}}" autocomplete="account_number">
            </div>

              </div>
              <div class="col-md-6">
              <div class="form-group">
                <label for="first_name">Employment Status</label>
            <input type="text" name="full_name" disabled   class="form-control" value="{{$profile->employment_status ?? ''}}" autocomplete="first_name">
            </div>
            <div class="form-group">
                <label for="last_name">Marital Status</label>
            <input type="text" name="last_name" id="last_name" class="form-control" value="{{$profile->marital_status ?? ''}}" disabled autocomplete="last_name">
            </div>

            <div class="form-group">
                <label for="bank_name">Bank Name</label>
            <input type="text" disabled name="bank" id="bank_name" class="form-control" value="{{$profile->bank ?? ''}}" autocomplete="bank_name">
            </div>

            
            <div class="form-group">
                <label for="account_number">Account Number</label>
            <input type="number" disabled name="account_number" id="account_number" class="form-control" value="{{$profile->account_number ?? ''}}" autocomplete="account_number">
            </div>

            <div class="form-group">
                <label for="account_number">Account Name</label>
            <input type="text" disabled name="account_name" id="account_number" class="form-control" value="{{$profile->account_name ?? ''}}" autocomplete="account_number">
            </div>

            <div class="form-group">
                <label for="account_number">Account Type</label>
            <input type="text" disabled name="account_type" id="account_number" class="form-control" value="{{$profile->account_type ?? ''}}" autocomplete="account_number">
            </div>
              </div>
            </div>
            

            <!-- <div class="form-group">
                <div class="media align-items-center mb-3">
                    <img class="mr-3 rounded-circle mr-0 mr-sm-3"
                        src="{{$profile->avatar}}" width="55" height="55" alt="">
                    <div class="media-body">
                        <h4 class="mb-0">{{$profile->user->username}}</h4>
                        <p class="mb-0">Max file size is 2mb
                        </p>
                    </div>
                </div>
                <div class="file-upload-wrapper" data-text="Change Photo">
                    <input name="avatar" type="file"
                        class="file-upload-field">
                </div>
            </div> -->
        
             

            <div class="form-group col-12">
              <a href="{{route('users')}}" type="button" class="btn btn-success">Users</a>
                <!-- <button type="submit" class="btn btn-success pl-5 pr-5">Update</button> -->
            </div>
        </form>
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
  
@endsection()