<nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="index.html">Ecommerce</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse row-md navbar-collapse justify-content-end" id="navbarsExampleDefault">
            <form class="my-2 my-lg-0 col-md-6">
                <div class="input-group input-group-sm">
                    <input type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" placeholder="What are you looking for...">
                    <div class="input-group-append">
                        <button type="button" class="btn btn-secondary btn-number">
                            <i class="fa fa-search"></i>
                        </button>
                    </div>
                </div>
            </form>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{url('/home')}}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="category.html">Categories</a>
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
                    <li class="nav-item">
                        <a class="nav-link" href="contact.html">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-success btn-sm" href="{{route('wishlist.index')}}">
                            <i class="fa fa-shopping-bag"></i> Wishlist
                            <span class="badge badge-light wishlist">
                                {{$wishlistTotal}}
                            </span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-success btn-sm" href="{{route('cart.index')}}">
                            <i class="fa fa-shopping-cart"></i> Cart
                            <span class="badge badge-light cart">{{$cartTotal}}</span>
                        </a>
                    </li>

                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            <i class="fa fa-user-circle-o" aria-hidden="true" style="color: white;font-size: 20px"></i>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item">
                                {{ Auth::user()->name }}
                            </a>
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
</nav>
<header>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="logo"><a href="index.html" class="animsition-link">Ecommerce Logo</a></div>
                <div class="header-cart"><i class="ion ion-android-cart"></i> <a class="cart-contents" href="cart.html" title="View your shopping cart">2 items - <span class="amount">$123.50</span></a></div>
                <div class="nav-menu-icon"><a href="#" class=""><i></i></a></div>
                <nav class="">
                    <ul class="menu">
                        <li><a href="#">Home <span class="ion ion-ios-arrow-down"></span></a>
                            <ul class="dropmenu">
                                <li><a href="index.html">Home Image</a></li>
                                <li><a href="home-text-rotator.html">Home Text Rotator</a></li>
                                <li><a href="home-slider.html">Home Slider</a></li>
                                <li><a href="home-video-bg.html">Home Video BG</a></li>
                            </ul>
                        </li>
                        <li><a href="#">Portfolio <span class="ion ion-ios-arrow-down"></span></a>
                            <ul class="dropmenu">
                                <li><a href="portfolio-2-column.html">2 Column Portfolio</a></li>
                                <li><a href="portfolio-3-column.html">3 Column Portfolio</a></li>
                                <li><a href="portfolio-4-column.html">4 Column Portfolio</a></li>
                                <li><a href="#">Detail <span class="ion ion-ios-arrow-down"></span></a>
                                    <ul class="submenu">
                                        <li><a href="portfolio-detail.html">Detail 1</a></li>
                                        <li><a href="portfolio-detail-2.html">Detail 2</a></li>
                                        <li><a href="portfolio-detail-3.html">Detail 3</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li><a href="#">Pages <span class="ion ion-ios-arrow-down"></span></a>
                            <ul class="dropmenu">
                                <li><a href="#">About Us <span class="ion ion-ios-arrow-down"></span></a>
                                    <ul class="submenu">
                                        <li><a href="about-us.html">About Us 1</a></li>
                                        <li><a href="about-us-2.html">About Us 2</a></li>
                                    </ul>
                                </li>
                                <li><a href="#">Team <span class="ion ion-ios-arrow-down"></span></a>
                                    <ul class="submenu">
                                        <li><a href="team.html">Team 1</a></li>
                                        <li><a href="team-2.html">Team 2</a></li>
                                    </ul>
                                </li>
                                <li><a href="#">Services <span class="ion ion-ios-arrow-down"></span></a>
                                    <ul class="submenu">
                                        <li><a href="services.html">Services 1</a></li>
                                        <li><a href="services-2.html">Services 2</a></li>
                                    </ul>
                                </li>
                                <li><a href="#">Faqs <span class="ion ion-ios-arrow-down"></span></a>
                                    <ul class="submenu">
                                        <li><a href="faqs.html">Faqs 1</a></li>
                                        <li><a href="faqs-2.html">Faqs 2</a></li>
                                    </ul>
                                </li>
                                <li><a href="#">Contact Us <span class="ion ion-ios-arrow-down"></span></a>
                                    <ul class="submenu">
                                        <li><a href="contact-us.html">Contact Us 1</a></li>
                                        <li><a href="contact-us-2.html">Contact Us 2</a></li>
                                    </ul>
                                </li>
                                <li><a href="career.html">Career</a></li>
                                <li><a href="404-error.html">404 Error</a></li>
                            </ul>
                        </li>
                        <li><a href="#">Shop <span class="ion ion-ios-arrow-down"></span></a>
                            <ul class="dropmenu">
                                <li><a href="shop-list.html">Shop List</a></li>
                                <li><a href="product-detail.html">Shop Detail</a></li>
                                <li><a href="cart.html">Cart</a></li>
                                <li><a href="cart-empty.html">Cart Empty</a></li>
                            </ul>
                        </li>
                        <li><a href="#">Blog <span class="ion ion-ios-arrow-down"></span></a>
                            <ul class="dropmenu">
                                <li><a href="blog-3-column.html">3 Column</a></li>
                                <li><a href="blog-2-column.html">2 Column</a></li>
                                <li><a href="blog-full-width.html">Full Width</a></li>
                                <li><a href="blog-timeline.html">Timeline Blog</a></li>
                                <li><a href="single-post.html">Single Post</a></li>
                            </ul>
                        </li>
                        <li><a href="elements.html">Elements</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</header>

