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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <!-- Main Css -->
    <link rel="stylesheet" href="{{asset('css/main.css')}}" />
</head>

<body class="">
@include('includes.navbar')
<div style="min-height: 80vh">
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
                    <li><a href="http://webenlance.com">Help Center</a></li>
                    <li><a href="http://webenlance.com">Money refund</a></li>
                    <li><a href="http://webenlance.com">Terms and Policy</a></li>
                    <li><a href="http://webenlance.com">Open dispute</a></li>
                </ul>
                <!--footer_ul_amrc ends here-->
            </div>

            <div class=" col-sm-4 col-md  col-6 col">
                <h5 class="headin5_amrc col_white_amrc pt2">My Account</h5>
                <!--headin5_amrc-->
                <ul class="footer_ul_amrc">
                    <li><a href="http://webenlance.com">User Login</a></li>
                    <li><a href="http://webenlance.com">User Register</a></li>
                    <li><a href="http://webenlance.com">Account Setting</a></li>
                    <li><a href="http://webenlance.com">My Orders</a></li>
                    <li><a href="http://webenlance.com">My Wishlist</a></li>
                </ul>
                <!--footer_ul_amrc ends here-->
            </div>


            <div class=" col-sm-4 col-md  col-6 col">
                <h5 class="headin5_amrc col_white_amrc pt2">About</h5>
                <!--headin5_amrc-->
                <ul class="footer_ul_amrc">
                    <li><a href="http://webenlance.com">Our history</a></li>
                    <li><a href="http://webenlance.com">How to buy</a></li>
                    <li><a href="http://webenlance.com">Delivery and payment</a></li>
                    <li><a href="http://webenlance.com">Advertise</a></li>
                    <li><a href="http://webenlance.com">Partnership</a></li>
                </ul>
                <!--footer_ul_amrc ends here-->
            </div>



            <div class=" col-sm-4 col-md col-sm-4  col-12 col">
                <h5 class="headin5_amrc col_white_amrc pt2">Find us</h5>
                <!--headin5_amrc-->
                <p><i class="fa fa-location-arrow"></i> 9878/25 sec 9 rohini 35 </p>
                <p><i class="fa fa-phone"></i>  +91-9999878398  </p>
                <p><i class="fa fa fa-envelope"></i> info@techwise.com</p>

            </div>

        </div>
    </div>


    <div class="container">
        <ul class="foote_bottom_ul_amrc">
            <li><a href="#">Home</a></li>
            <li><a href="#">About</a></li>
            <li><a href="#">Services</a></li>
            <li><a href="#">Pricing</a></li>
            <li><a href="#">Blog</a></li>
            <li><a href="#">Contact</a></li>
        </ul>

        <!--foote_bottom_ul_amrc ends here-->
        <p class="text-center">Copyright &copy;
            <script>
                document.write(new Date().getFullYear())
            </script> | Designed With love by <a href="#">Techwise</a> All Rights Reserved.</p>

        <ul class="social_footer_ul">
            <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
            <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
            <li><a href="#"><i class="fab fa-instagram"></i></a></li>
        </ul>
        <!--social_footer_ul ends here-->
    </div>

</footer>

{{--end footer section--}}
{{--<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>--}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>

@yield('scripts')
<script src="{{asset('js/main.js')}}"></script>

</body>

</html>
