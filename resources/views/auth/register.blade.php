<!DOCTYPE html>
<html lang="en">
<head>
	<title>iCREDENCE Affiliate Portal </title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/front/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/front/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/front/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/front/fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/front/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="/front/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/front/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/front/vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="/front/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/front/css/util.css">
	<link rel="stylesheet" type="text/css" href="/front/css/main.css">
<!--===============================================================================================-->
</head>
<body style="background-color: gray;">
	
	<div class="limiter">
		<div class="container-login100">
			<div class="login100-more" style="background-image: url('/front/images/bg5.jpeg');">
			<br><br><br><br><br><br><br><br><br>
				<h1 class="text-justify text-white pt-5" style="margin-left: 10%;">Welcome to Icredence Affiliate Portal</h1>
				<p class="text-justify text-white" style="margin-left: 15%;font-size: large;">		
A new standard in performance and pay programme. <br>
Refer - Register - Reward
		</p>
			</div>

			<div class="wrap-login100 p-l-50 p-r-50 p-t-72 p-b-50">
			@if(session()->has('message'))
                <span class="alert alert-success">{{session()->get('message')}}</span>
                 
                @endif
                    <br><br>
				<form class="login100-form validate-form" role="form" method="POST" action="{{ route('register') }}">
					<span class="login100-form-title p-b-39">
						Sign Up
					</span>
                    {!! csrf_field() !!}
                     
                    <div class="wrap-input100 validate-input" data-validate="Username is required">
						<span class="label-input100">Username</span>
						<input class="input100 @error('username') is-invalid @enderror" type="text" name="username" id="username" placeholder="Username...">
                        <span class="focus-input100"></span>
                        @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<span class="label-input100">Email</span>
						<input class="input100" type="email" name="email" placeholder="Email addess...">
                        <span class="focus-input100"></span>
                        @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
					</div>

				

					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<span class="label-input100">Password</span>
						<input class="input100" type="password" name="password" placeholder="*************">
                        <span class="focus-input100"></span>
                        @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Repeat Password is required">
						<span class="label-input100">Repeat Password</span>
						<input class="input100" type="password" name="password_confirmation" placeholder="*************">
                        <span class="focus-input100"></span>
                        @error('password_confirmation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
					</div>

					 

					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button type="submit" class="login100-form-btn">
								Sign Up
							</button>
						</div>

						<!-- <a href="#" class="dis-block txt3 hov1 p-r-30 p-t-10 p-b-10 p-l-30">
							Sign in
							<i class="fa fa-long-arrow-right m-l-5"></i>
						</a> -->
					</div>
				</form>
			</div>
		</div>
	</div>
	
<!--===============================================================================================-->
<script src="/front/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="/front/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="/front/vendor/bootstrap/js/popper.js"></script>
	<script src="/front/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="/front/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="/front/vendor/daterangepicker/moment.min.js"></script>
	<script src="/front/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="/front/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="/front/js/main.js"></script>

</body>
</html>