<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('img/apple-icon.png')}}">
    <link rel="icon" type="image/png" href="{{asset('img/favicon.png')}}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>
        Laravel ecommerce project
    </title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
    <!-- Bootstrap -->
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- Main Css -->
    <link rel="stylesheet" href="{{asset('css/main.css')}}" />
</head>

<body class="">
{{--Navbar section--}}
<nav class="navbar navbar-expand-lg bg-primary">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar bar1"></span>
            <span class="navbar-toggler-bar bar2"></span>
            <span class="navbar-toggler-bar bar3"></span>
        </button>
        <a class="navbar-brand" href="#">Ecommerce</a>

        <div class="collapse navbar-collapse ml-5" id="navbarSupportedContent">
            <div class="row justify-content-between w-100">
                <div class="col-md-8 order-md-1">
            <form class="ml-auto w-100" data-background-color>
                <div class="form-group has-white">
                    <input type="text" class="form-control" placeholder="What are you looking for...">
                </div>
            </form>
                </div>
                <div class="col-md-4 order-md-12">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item active">
                    <a class="nav-link" href="{{url('/home')}}">Home <span class="sr-only">(current)</span></a>
                </li>
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else

                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest

            </ul>
                </div>
            </div>
            <div class="nav-item">
                <i class="nav-link now-ui-icons shopping_cart-simple" style="font-size: 25px;color:white;"></i>
            </div>

        </div>
    </div>
</nav>


{{--End navbar section--}}
        @yield('content')

{{-- footer section --}}
<footer class="footer " data-background-color="black">
    <div class="container">
        <div class="content">
            <div class="row">
                <div class="col-md-3">
                    <h5>Customer Services</h5>
                    <ul class="links-vertical">
                        <li class="w-100">
                            <a href="#pablo" class="text-muted">
                                Help Center
                            </a>
                        </li>
                        <li class="w-100">
                            <a href="#pablo" class="text-muted">
                                Money refund
                            </a>
                        </li>
                        <li class="w-100">
                            <a href="#pablo" class="text-muted">
                                Terms and Policy
                            </a>
                        </li>
                        <li class="w-100">
                            <a href="#pablo" class="text-muted">
                                Open dispute
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <h5>My Account</h5>
                    <ul class="links-vertical">
                        <li class="w-100">
                            <a href="#pablo" class="text-muted">
                                User Login
                            </a>
                        </li>
                        <li class="w-100">
                            <a href="#pablo" class="text-muted">
                                User Register
                            </a>
                        </li>
                        <li class="w-100">
                            <a href="#pablo" class="text-muted">
                                Account Setting
                            </a>
                        </li>
                        <li class="w-100">
                            <a href="#pablo" class="text-muted">
                                My Orders
                            </a>
                        </li>
                        <li class="w-100">
                            <a href="#pablo" class="text-muted">
                                My Wishlist
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <h5>About</h5>
                    <ul class="links-vertical">
                        <li class="w-100">
                            <a href="#pablo" class="text-muted">
                                Our History
                            </a>
                        </li>
                        <li class="w-100">
                            <a href="#pablo" class="text-muted">
                                How to buy
                            </a>
                        </li>
                        <li class="w-100">
                            <a href="#pablo" class="text-muted">
                                Delivery and payment
                            </a>
                        </li>
                        <li class="w-100">
                            <a href="#pablo" class="text-muted">
                                Advertise
                            </a>
                        </li>
                        <li class="w-100">
                            <a href="#pablo" class="text-muted">
                                Partnership
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <h5>Contacts</h5>
                    <ul class="links-vertical">
                        <li class="w-100">
                            <a href="#pablo">
                                Phone : +123456789
                            </a>
                        </li>
                        <li class="w-100">
                            <a href="#pablo">
                                Fax : +1234567890
                            </a>
                        </li>
                    </ul>
                    <ul class="social-buttons">
                        <li>
                            <a href="#pablo" class="btn btn-icon btn-neutral btn-twitter btn-round">
                                <i class="fa fa-twitter"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#pablo" class="btn btn-icon btn-neutral btn-facebook btn-round">
                                <i class="fa fa-facebook-square"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#pablo" class="btn btn-icon btn-neutral btn-google btn-round">
                                <i class="fa fa-google-plus"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#pablo" class="btn btn-icon btn-neutral btn-instagram btn-round">
                                <i class="fas fa-instagram"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <hr />
        <div class="copyright">
            Copyright &copy;
            <script>
                document.write(new Date().getFullYear())
            </script> Techwise All Rights Reserved.
        </div>
    </div>
</footer>
{{-- End footer section --}}
{{--<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>--}}
@include('includes/scripts')
@yield('scripts')


</body>

</html>
