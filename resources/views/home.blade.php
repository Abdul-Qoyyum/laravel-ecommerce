@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row" style="padding: 100px 0;">
        @if($products)
            <input type="hidden" name="_token" id="token" value="{{csrf_token()}}">
        @foreach($products as $product)
        <div class="col-md-3 col-sm-6">
            <div class="product-grid3">
                <div class="product-image3">
                    <a href="#">
                        <img class="pic-1" src="{{$product->photo->first_url}}">
                        <img class="pic-2" src="{{$product->photo->second_url}}">
                    </a>
                    <ul class="social">
                        <li>
                            <a class="addToWishlist" id="{{$product->id}}" href="#"><i class="fa fa-shopping-bag"></i></a>
                        </li>
                        <li>
                            <a class="addToCart"  id="{{$product->id}}" href="#"><i class="fa fa-shopping-cart"></i></a>
                        </li>
                    </ul>
                    <span class="product-new-label">New</span>
                </div>
                <div class="product-content">
                    <h3 class="title"><a href="#">{{$product->name}}</a></h3>
                    <div class="price">
                        ${{$product->price}}
                        <span>$75.00</span>
                    </div>
                    <ul class="rating">
                        <li class="fa fa-star"></li>
                        <li class="fa fa-star"></li>
                        <li class="fa fa-star"></li>
                        <li class="fa fa-star disable"></li>
                        <li class="fa fa-star disable"></li>
                    </ul>
                </div>
            </div>
        </div>
            @endforeach
        @endif
    </div>
</div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function () {
            //add to cart
            $('.addToCart').click(function(e){
                e.preventDefault();
                let button = $(this);
                let productId  = button.attr('id');
                $.post('/cart',{id : productId,"_token":$('#token').val()},function (data) {
                    //update the cart number
                    $('.cart').text(data.count);
                });
            });

        //    add to wishlist
            $('.addToWishlist').click(function(e){
                e.preventDefault();
                let bag = $(this);
                let productId  = bag.attr('id');
                $.post('/wishlist',{id : productId,"_token":$('#token').val()},function (data) {
                    //update the wishlist number
                    $('.wishlist').text(data.count);
                });
            });




        });
    </script>
    @stop
