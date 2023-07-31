<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="description" content="">
        <meta name="author" content="Tooplate">

        <title>@yield('title')</title>

        <!-- CSS FILES -->
        <link rel="preconnect" href="https://fonts.googleapis.com">

        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:ital
        ,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,900&display=swap" rel="stylesheet">

        <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet">
        <link href="{{asset('assets/css/bootstrap-icons.css')}}" rel="stylesheet">
        <link href="{{asset('assets/css/magnific-popup.css')}}" rel="stylesheet">
        <link href="{{asset('assets/css/tooplate-waso-strategy.css')}}" rel="stylesheet">
        <link href="{{asset('assets/css/buyer%20profile.css')}}" rel="stylesheet">
        <link href="{{asset('assets/css/Broker-Home.css')}}" rel="stylesheet">
        <link href="{{asset('assets/css/postdetails.css')}}" rel="stylesheet">
        <link href="{{asset('assets/css/search.css')}}" rel="stylesheet">
        <link href="{{asset('assets/css/notification%20buyer.css')}}" rel="stylesheet">
        <link href="{{asset('assets/css/ProfileBroker111.css')}}" rel="stylesheet">


<!--

Tooplate 2130 Waso Strategy

https://www.tooplate.com/view/2130-waso-strategy

Free Bootstrap 5 HTML Template

-->

    </head>

    <body id="section_1">

        <header class="site-header">
            <div class="container">
                <div class="row align-items-center">

                    <div class="col-lg-3 col-md-5 col-7">
                        <a href="#" class="navbar-brand">MR <span class="text-danger">Broker</span></a>
                    </div>

                    <div class="col-lg-3 col-md-3 col-12 ms-auto">
                        <div class="choose-but" style="margin-top: 5px">
                            <i class="bi bi-plus" style="font-size: 1.5rem;"  data-bs-toggle="modal" data-bs-target="#addPostModal"></i>
                        </div>

                        <a href="{{route('search_index')}}"><i class="bi bi-search"></i></a>
                        <a href="{{route('notification')}}"><i class="bi bi-bell"></i></a>


                        <div class="profile-image" style="background-image: url('{{asset(Auth::guard('web')->user()->image_url) ?? asset('assets/images/UserProfile') }}')"></div>

<style>
    .profile-image {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        background-size: cover;
        background-position: center;
        border: 2px solid #6739e6;
    }

    .dropdown-menu {
        list-style-type: none;
        margin: 0;
        padding: 0;
        display: none; /* Hide the dropdown menu by default */
    }

    /* Show the dropdown menu when the button is clicked */
    .dropdown-menu.active {
        display: block;
    }

    .form-container {
        margin-top: 10px;
    }

    .form-container button {
        background: none;
        border: none;
        color: #6739e6;
        cursor: pointer;
    }

</style>
                        <div>
                            <button style="background: none; border: none" id="dropdownButton">
                                <i class="bi bi-chevron-down"></i>
                            </button>
                        </div>
                        <ul class="dropdownMenu" id="dropdownMenu">
                            <li>
                                <div class="form-container">
                                    <form action="{{ route('logout') }}" method="post">
                                        @csrf <!-- Include CSRF token for security -->
                                        <button type="submit">LogOut</button>
                                    </form>
                                </div>
                            </li>
                        </ul>


                </div>
            </div>
            </div>
        </header>

        <nav class="navbar navbar-expand-lg bg-white shadow-lg">
            <div class="container">
                <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>


                <div class="cc">
                    <span style="font-size:20px;cursor:pointer;padding-left: 15px;padding-top: 15px" onclick="openNav()">&#9776; Browse Categories</span>
                </div>


                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul  class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="{{route('posts.index')}}"><small class="small-title"><strong class="text-warning"></strong></small> Home</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="{{route('posts.all')}}"><small class="small-title"><strong class="text-warning"></strong></small> Post</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="{{route('offer')}}"><small class="small-title"><strong class="text-warning"></strong></small> Offer</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="{{route('profile_info')}}"><small class="small-title"><strong class="text-warning"></strong></small> Profile</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="{{route('posts_save.index')}}"><small class="small-title"><strong class="text-warning"></strong></small> Saved Post</a>
                        </li>
                    </ul>
                    <div>




                        <div class="collapse1 navbar-collapse1" id="navbarNav1">
                            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                            <ul  class="navbar-nav1 ms-auto">
                                <li class="nav-item">
                                    <a class="nav-link1 click-scroll" href="{{route('posts.index')}}"><small class="small-title"><strong class="text-warning"></strong></small> Home</a>
                                </li>

                                <li class="nav-item1">
                                    <a class="nav-link1 click-scroll" href="{{route('posts.all')}}"><small class="small-title"><strong class="text-warning"></strong></small> Post</a>
                                </li>

                                <li class="nav-item1">
                                    <a class="nav-link1 click-scroll" href="{{route('offer')}}"><small class="small-title"><strong class="text-warning"></strong></small> Offer</a>
                                </li>

                                <li class="nav-item1">
                                    <a class="nav-link1 click-scroll" href="{{route('profile_info')}}"><small class="small-title"><strong class="text-warning"></strong></small> Profile</a>
                                </li>

                                <li class="nav-item1">
                                    <a class="nav-link1 click-scroll" href="{{route('posts_save.index')}}"><small class="small-title"><strong class="text-warning"></strong></small> Saved Post</a>
                                </li>
                            </ul>
                            <div>




                            </div>
                        </div>
                    </div>
                </div>
            </div>
</nav>

      @yield('content')

        <footer class="site-footer footer">
            <div class="container">
                <div class="section">



                    <div class="section1">
                        <div class="grou">
                        <img src="{{asset('assets/images/logo2.png')}}">
                        <span>Mr Broker</span>
                        </div>
                        <p>Best Choice For You !</p>



                    </div>



                    <div class="section3">
                        <p class="p1">Our Social Links</p>

                        <ul class="social-icon">
                            <li><a href="#" class="social-icon-link bi-facebook" style="background-color: #3D5A96"></a></li>

                            <li><a href="#" class="social-icon-link bi-twitter" style="background-color: #2AA3EF"></a></li>

                            <li><a href="#" class="social-icon-link bi bi-linkedin" style="background-color: #007AB7"></a></li>

                            <li><a href="#" class="social-icon-link bi bi-google" style="background-color: #DA483F"></a></li>

                            <li><a href="#" class="social-icon-link bi bi-envelope" style="background-color: #2F75EC"></a></li>

                        </ul>

                    </div>
                </div>


                                    <div class="section2">
                                        <nav>
                                            <ul>
                                                <li><a href="#">Contact</a></li>
                                                <li><a href="#">About</a></li>
                                                <li><a href="#">Privacy Policy </a></li>
                                                <li><a href="#">Our Site Map</a></li>
                                                <li><a href="#">Sponsor</a></li>
                                                <li><a href="{{route('register')}}">Regester</a></li>
                                                <li><a href="{{route('login')}}">Login </a></li>


                                            </ul>
                                        </nav>
                                    </div>



            </div>
            <div class="copyright">
                <p>2023. Mr Broker . All Right Reserved</p>
            </div>

        </footer>

    </body>
</html>



        <!-- JAVASCRIPT FILES -->
<script src="{{asset('assets/js/jquery.min.js')}}"></script>
<script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/js/jquery.sticky.js')}}"></script>
<script src="{{asset('assets/js/jquery.magnific-popup.min.js')}}"></script>
<script src="{{asset('assets/js/magnific-popup-options.js')}}"></script>
<script src="{{asset('assets/js/click-scroll.js')}}"></script>
<script src="{{asset('assets/js/custom.js')}}"></script>
<script src="{{asset('assets/js/profile.js')}}"></script>
<script src="{{asset('assets/js/saved.js')}}"></script>
<script src="{{asset('assets/js/butoon.js')}}"></script>
<script src="{{asset('assets/js/saved1.js')}}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>


@stack('js')







    </body>
</html>
