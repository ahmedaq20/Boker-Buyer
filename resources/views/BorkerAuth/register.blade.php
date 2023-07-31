<!DOCTYPE html>
<html lang="en">

<head>
    <title>Account Broker</title>
    <meta charset="UTF-8">
    <link rel="icon" type="image/png" href="{{asset('assets2/images/icons/favicon.ico')}}" />
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

    <link rel="stylesheet" type="text/css" href="{{asset('assets2/css/account%20broker.css')}}">
</head>

<body style="background-color: #666666;">
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <form method="POST" action="{{ route('register.store') }}" class="login100-form validate-form">
                    @csrf
                    <h1>Welcome to Mr Broker</h1>
                    <span class="login100-form-title p-b-43">
                        Create a new account
                    </span>

                    <div class="bur">
                        <a href="#">Buyer</a>
                        <a class="active" href="#">Broker</a>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
                        <input class="input100" type="text" name="name" placeholder="Name">
                        <span class="focus-input100"></span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
                        <input class="input100" type="text" name="email" placeholder="Email" autocomplete="off">
                        <span class="focus-input100"></span>
                    </div>


                <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
                    <select name="cantry" class="opt" style="height: 50px;width:90px; border: 1px solid #e6e6e6;
                    border-bottom-left-radius: 10px;
                    border-top-left-radius: 10px;
                    outline-color: var(--main-color);

                    background: none;
                     color:#999999; text-align: center " >
                        <option>SAU</option>
                        <option>DZA	</option>
                        <option>EGY</option>
                        <option>JOR</option>
                        <option>KWT</option>
                        <option>LBN</option>
                        <option>LBY</option>
                        <option>MYS</option>
                        <option>MAR</option>
                        <option>OMN	</option>
                        <option>QAT</option>
                    </select>
                    <input class="input100" type="number" name="phone_number" placeholder="+966 000 000 000">
                    <span class="focus-input100"></span>
<!--                    <span class="label-input1001">+966 000 000 000</span>-->
                </div>


                    <div class="wrap-input100 validate-input" data-validate="Password is required">
                        <input class="input100" autocomplete="off" type="password" name="password" placeholder="Password">
                        <span class="focus-input100"></span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Password is required">
                        <input class="input100" type="password" name="password_confirmation"
                            placeholder="Confirmation Password">
                        <span class="focus-input100"></span>
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
                            Next
                        </button>
                    </div>

                    <div class="text-center p-t-46 p-b-20">
                        <span class="txt2">
                            You have an account?<a href="{{route('broker.login')}}">Log in</a>
                        </span>
                    </div>

                    <div class="text-center p-t-251 p-b-20">
                        <span class="txt3">
                            Or sign Up With
                        </span>
                    </div>

                    <div class="login100-form-social flex-c-m">
                        <a href="#" class="login100-form-social-item flex-c-m bg1 m-r-5">
                            <i class="fa fa-facebook-f" aria-hidden="true"></i>
                        </a>

                        <a href="#" class="login100-form-social-item flex-c-m bg2 m-r-5">
                            <i class="fa fa-google" aria-hidden="true"></i>
                        </a>
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
