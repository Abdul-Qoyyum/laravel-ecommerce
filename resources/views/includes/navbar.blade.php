<header>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="logo"><a href="{{url('/home')}}" class="animsition-link">Ecommerce Logo</a></div>
                @guest
                @if (Route::has('register'))
                @endif
                    @else
                    <div class="header-cart"><a class="cart-contents ml-2" href="{{route('wishlist.index')}}" title="View your wishlist">
                            <i class="fa fa-heart" style="font-size:20px" aria-hidden="true"></i><span class='badge badge-warning wishlist' id='lblwishCount'>{{$wishlistTotal}}</span></a>
                        <a class="cart-contents" href="{{route('cart.index')}}" title="View your shopping cart"><i class="fa" style="font-size:20px">&#xf07a;</i>
                            <span class='badge badge-warning cart' id='lblCartCount'>{{$cartTotal}}</span></a></div>
                    <div class="nav-menu-icon"><a href="#" class=""><i></i></a>
                    </div>
                @endguest
                <nav class="">
                    <ul class="menu">
                        <li>
                            <form class="my-2 my-lg-3 form-group container">
                                <div class="input-group input-group-sm">
                                    <input type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" placeholder="What are you looking for...">
                                    <div class="input-group-append">
                                        <button type="button" class="btn btn-secondary btn-number">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </li>

                        <li><a href="{{url('/home')}}">Home</a></li>
                        <li><a href="#">Categories<span class="ion ion-ios-arrow-down"></span></a>
                            @if($categories)
                            <ul class="dropmenu">
                                @foreach($categories as $category)
                                  <li><a href="/category/{{$category->slug}}">{{$category->name}}</a></li>
                                    @endforeach
                            </ul>
                                @endif
                        </li>
                        <li><a href="#">Pages <span class="ion ion-ios-arrow-down"></span></a>
                            <ul class="dropmenu">
                                <li><a href="#">About Us <span class="ion ion-ios-arrow-down"></span></a>
                                    <ul class="submenu">
                                        <li><a href="#">About Us 1</a></li>
                                        <li><a href="#">About Us 2</a></li>
                                    </ul>
                                </li>
                                <li><a href="#">Team <span class="ion ion-ios-arrow-down"></span></a>
                                    <ul class="submenu">
                                        <li><a href="#">Team 1</a></li>
                                        <li><a href="#">Team 2</a></li>
                                    </ul>
                                </li>
                                <li><a href="#">Services <span class="ion ion-ios-arrow-down"></span></a>
                                    <ul class="submenu">
                                        <li><a href="#">Services 1</a></li>
                                        <li><a href="#">Services 2</a></li>
                                    </ul>
                                </li>
                                <li><a href="#">Faqs <span class="ion ion-ios-arrow-down"></span></a>
                                    <ul class="submenu">
                                        <li><a href="#">Faqs 1</a></li>
                                        <li><a href="#">Faqs 2</a></li>
                                    </ul>
                                </li>
                                <li><a href="#">Contact Us <span class="ion ion-ios-arrow-down"></span></a>
                                    <ul class="submenu">
                                        <li><a href="#">Contact Us 1</a></li>
                                        <li><a href="#">Contact Us 2</a></li>
                                    </ul>
                                </li>
                                <li><a href="#">Career</a></li>
                            </ul>
                        </li>

                        @guest
                            <li>
                                <a href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li>
                                    <a href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li><a href="#">Account <span class="ion ion-ios-arrow-down"></span></a>
                            <ul class="dropmenu">
                                <li><a href="#">{{ Auth::user()->name }}</a></li>
                                <li><a href="#">Order</a></li>
                                <li><a href="{{route('cart.index')}}">Cart</a></li>
                                <li><a href="{{route('wishlist.index')}}">Wishlist</a></li>
                                <li><a  href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">{{ __('Logout') }}</a></li>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </ul>
                        </li>
                        @endguest
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</header>

