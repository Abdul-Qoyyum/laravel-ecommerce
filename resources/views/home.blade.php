@extends('layouts.app')

@section('content')
    <div style="margin-bottom: 10px;">
        <div class="hero">
    </div>
    <div class="row">
        @if($products)
            <input type="hidden" name="_token" id="token" value="{{csrf_token()}}">
            @foreach($products as $product)
                <div class="col-md-3 col-sm-6">
                <div class="product-grid2">
                    <div class="product-image2">
                        <a href="#">
                            <img class="pic-1" style="height: 300px;" src="{{$product->photo->first_url}}">
                            <img class="pic-2" style="height: 300px;" src="{{$product->photo->second_url}}">
                        </a>
                        <ul class="social">
                            <li><a href="#" data-tip="Quick View"><i class="fa fa-eye"></i></a></li>
                            <li><a href="#"  class="addToWishlist" id="{{$product->id}}" data-tip="Add to Wishlist"><i class="fa fa-shopping-bag"></i></a></li>
                            <li><a href="#"  class="addToCart"  id="{{$product->id}}"   data-tip="Add to Cart"><i class="fa fa-shopping-cart"></i></a></li>
                        </ul>
                        <a class="buy-now" href="">Buy now</a>
                    </div>
                    <div class="product-content">
                        <h3 class="title"><a href="#">{{$product->name}}</a></h3>
                        <span class="price">&#36; {{$product->price}}</span>
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
