<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login Buyer</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="{{asset('assets2/images/icons/favicon.ico')}}"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('assets2/vendor/bootstrap/css/bootstrap.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('assets2/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('assets2/fonts/Linearicons-Free-v1.0.0/icon-font.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('assets2/vendor/animate/animate.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('assets2/vendor/css-hamburgers/hamburgers.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('assets2/vendor/animsition/css/animsition.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('assets2/vendor/select2/select2.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('assets2/vendor/daterangepicker/daterangepicker.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('assets2/css/util.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('assets2/css/main.css')}}">
<!--===============================================================================================-->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:ital,wght@0,
	100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&family=Roboto:ital,wght@0
	,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,900&display=swap" rel="stylesheet">
	<!--===============================================================================================-->
</head>
<body style="background-color: #666666;">

	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form" method="POST" action="{{ route('login') }}">
					<!-- CSRF Token -->
					@csrf

					<H1>Welcom to Mr Broker</H1>
					<span class="login100-form-title p-b-43">
						Log in to your account
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="text" name="email">
						<span class="focus-input100"></span>
						<span class="label-input100">Email</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Password is required">
						<input class="input100" type="password" name="password">
						<span class="focus-input100"></span>
						<span class="label-input100">Password</span>
					</div>

					<div class="flex-sb-m w-full p-t-3 p-b-32">
						<div class="contact100-form-checkbox">
							<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
							<label class="label-checkbox100" for="ckb1">
								Remember me
							</label>
						</div>

						<div>
							<a href="#" class="txt1">
								Forgot Password?
							</a>
						</div>
					</div>

					<div class="container-login100-form-btn">
						<button type="submit" class="login100-form-btn">
							Log in
						</button>
					</div>

					<div class="text-center p-t-46 p-b-20">
						<span class="txt2">
							You have an account? <a href="{{route('register')}}">Create Account </a>
						</span>
					</div>
				</form>

				<div class="login100-more" style="background-image: url({{asset('assets2/images/back.jpg')}});">
				</div>
			</div>
		</div>
	</div>




<!--===============================================================================================-->
	<script src="{{asset('assets2/vendor/jquery/jquery-3.2.1.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('assets2/vendor/animsition/js/animsition.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('assets2/vendor/bootstrap/js/popper.js')}}"></script>
	<script src="{{asset('assets2/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('assets2/vendor/select2/select2.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('assets2/vendor/daterangepicker/moment.min.js')}}"></script>
	<script src="{{asset('assets2/vendor/daterangepicker/daterangepicker.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('assets2/vendor/countdowntime/countdowntime.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('assets2/js/main.js')}}"></script>

</body>
</html>
