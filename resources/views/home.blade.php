@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>

    @if($products)

    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="row">

        @foreach($products as $product)
        <div class=" col-md-3  col-sm-6">
            <div class="card">
                <img class="card-img-top" style="height: 250px" src="{{$product->image->url}}" alt="{{$product->name}}">
                <div class="card-body">
                    <a href="{{route('cart.show',$product->id)}}" class="btn btn-primary d-block mx-auto">Buy Now</a>
                </div>
            </div>
        </div>
        @endforeach
            </div>
        </div>
    </div>

        @endif
</div>
@endsection
