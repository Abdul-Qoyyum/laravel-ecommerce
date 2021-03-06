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
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,500,600,700" rel="stylesheet">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <style>
        @media(min-width: 768px)  {
            .hero{
                height:80vh;
                background-image:url('{{asset("img/hero.png")}}');
                background-position: center;
                background-repeat: no-repeat;
                background-size: cover;
            }
        }
    </style>
    <!-- Main Css -->
    <link rel="stylesheet" href="{{asset('css/main.css')}}" />
</head>

<body class="">
@include('includes.navbar')
<div style="min-height: 80vh; background-color: #f5f5f5;">
        @yield('content')
</div>
{{--footer section--}}
<!--footer starts from here-->
<footer class="footer">
    <div class="container bottom_border">
        <div class="row">

            <div class=" col-sm-4 col-md  col-6 col">
                <h5 class="headin5_amrc col_white_amrc pt2">Customer Services</h5>
                <!--headin5_amrc-->
                <ul class="footer_ul_amrc">
                    <li><a href="#">Help Center</a></li>
                    <li><a href="#">Money refund</a></li>
                    <li><a href="#">Terms and Policy</a></li>
                    <li><a href="#">Open dispute</a></li>
                </ul>
                <!--footer_ul_amrc ends here-->
            </div>

            <div class=" col-sm-4 col-md  col-6 col">
                <h5 class="headin5_amrc col_white_amrc pt2">My Account</h5>
                <!--headin5_amrc-->
                <ul class="footer_ul_amrc">
                    <li><a href="#">User Login</a></li>
                    <li><a href="#">User Register</a></li>
                    <li><a href="#">Account Setting</a></li>
                    <li><a href="#">My Orders</a></li>
                    <li><a href="#">My Wishlist</a></li>
                </ul>
                <!--footer_ul_amrc ends here-->
            </div>


            <div class=" col-sm-4 col-md  col-6 col">
                <h5 class="headin5_amrc col_white_amrc pt2">About</h5>
                <!--headin5_amrc-->
                <ul class="footer_ul_amrc">
                    <li><a href="#">Our history</a></li>
                    <li><a href="#">How to buy</a></li>
                    <li><a href="#">Delivery and payment</a></li>
                    <li><a href="#">Advertise</a></li>
                    <li><a href="#">Partnership</a></li>
                </ul>
                <!--footer_ul_amrc ends here-->
            </div>



            <div class=" col-sm-4 col-md col-sm-4  col-12 col">
                <h5 class="headin5_amrc col_white_amrc pt2">Find us</h5>
                <!--headin5_amrc-->
                <p><i class="fa fa-location-arrow"></i> 9878/25 </p>
                <p><i class="fa fa-phone"></i>  +91-9999878398  </p>
                <p><i class="fa fa fa-envelope"></i> info@techwise.com</p>
            </div>

        </div>
    </div>


    <div class="container">
        <p class="text-center">Copyright &copy;
            <script>
                document.write(new Date().getFullYear())
            </script> | Designed With love by <a href="#">Techwise</a> All Rights Reserved.</p>
    </div>

</footer>

{{--end footer section--}}
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
@yield('scripts')
<script src="{{asset('js/main.js')}}"></script>

</body>

</html>
