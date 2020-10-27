
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="/assets/images/favicon.png">
    <!-- Custom Stylesheet -->
    <link rel="stylesheet" href="/assets/vendor/waves/waves.min.css">
    <link rel="stylesheet" href="/assets/vendor/owlcarousel/css/owl.carousel.min.css">
    <link rel="stylesheet" href="/assets/css/style.css">
</head>

<body>

    <div id="main-wrapper">

        <div class="header">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <nav class="navbar navbar-expand-lg navbar-light px-0 justify-content-between">
                        <a class="" href="{{url('/')}}"><img src="/assets/images/testimonial/VCA_logo5.png" class="img-thumbnail" style="height:70px;width:220px;" alt="">
                                </a>
                            <div class="dashboard_log">
                                <div class="d-flex align-items-center">
                                    <div class="header_auth">
                                        @guest
                                        <a href="{{route('login')}}" class="btn btn-success  mx-2">Sign In</a>
                                        @if (Route::has('register'))
                                        <a href="{{route('register')}}" class="btn btn-outline-primary  mx-2">Sign Up</a>
                                        @endif
                                        @else
                                        <a href="{{route('login')}}" class="btn btn-success  mx-2">Dashboard</a>
                                        @endguest
                                    </div>
                                </div>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>


        <main>
            @yield('content')
        </main>



        <div class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-md-6">
                        <div class="footer-link text-left">
                            <a href="#" class="m_logo"><img src="images/w_logo.png" alt=""></a>
                            <a href="{{url('about-us')}}">About</a>
                            <a href="{{url('privacy-policy')}}">Privacy Policy</a>
                            <a href="{{url('terms-and-condition')}}">Term & Service</a>
                        </div>
                    </div>
                    <div class="col-xl-6 col-md-6 text-lg-right text-center">
                        <div class="social">
                            <a href="#"><i class="fa fa-youtube-play"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-facebook"></i></a>
                        </div>
                    </div>
                </div>
                <div class="row align-items-center mt-3">
                    <div class="col-xl-12 text-center text-lg-right">
                        <div class="copy_right text-center text-lg-center">
                            Copyright © 2020 VCASS. All Rights Reserved.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="bg_icons"></div>


    <script src="/assets/vendor/jquery/jquery.min.js"></script>
    <script src="/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/assets/vendor/waves/waves.min.js"></script>

    <script src="/assets/vendor/validator/jquery.validate.js"></script>
    <script src="/assets/vendor/validator/validator-init.js"></script>

    <script src="/assets/js/scripts.js"></script>
</body>
</html>