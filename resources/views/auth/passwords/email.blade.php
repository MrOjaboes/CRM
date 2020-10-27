@extends('layouts.app')

@section('content')
    <div class="container" >
        <div class="row pt-5">
            <div class="col-md-5 col-md-offset-4">
                <div class="tablet">
                <div class="card-header justify-content-center">
                        <h4 class="card-title">Reset password</h4>
                    </div>
                    <div class="card-body">
                        @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                 <form class="form-horizontal" role="form" method="POST" action="{{ route('password.email') }}">
                            @csrf

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <div class="inner-addon right-addon">
                                <div class="col-md-12 input-group-lg">
                                    <i class="fa fa-envelope" aria-hidden="true"></i>
                                    <input type="email" class="form-control" style="border-radius: 4px; box-shadow:0px 2px 4px rgba(0,0,0,0.18); padding-right:40px; " name="email" value="{{ old('email') }}" placeholder="E-mail address">

                                </div>
                                </div>
                            </div>

                            
                            

                            <div class="form-group">
                                <div class="col-md-12">
                                
                                    <button type="submit" class="btn btn-success btn-lg btn-block" style="border-radius: 2px; box-shadow: 0px 2px 4px rgba(0,0,0,0.18);   background: #536be2; border: none;">
                                        <i class="fa fa-btn fa-sign-in"></i>Send
                                    </button> <br>
                                     
                                </div>
                                
                            </div>
                            <div class="col-md-12">
                               
                                 @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                 @if ($errors->has('password'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                                @if (Session::has('message'))
                                        <span class="help-block">
                                        <strong>{{ Session::get('message') }}</strong>
                                    </span>
                                @endif
                            </div>
                    </form>
                    </div>
            </div>
        </div>
    </div>
@endsection
