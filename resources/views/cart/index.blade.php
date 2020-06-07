@extends('layouts.app')
@section('content')
    <div class="container mb-4">
        <div class="row">
            @if(count($items))
            <div class="col-md-8 my-4">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th scope="col"> </th>
                            <th scope="col">Product</th>
                            <th scope="col" class="text-center">Quantity</th>
                            <th scope="col" class="text-center">Price</th>
                            <th scope="col" class="text-center">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                        @foreach($items as $item)
                            <tr>
                                <td class="img-wrapper"><img height="100px" width="100px" class="img-round" src="{{$item->associatedModel->photo->first_url}}" /> </td>
                                <td>{{$item->name}}</td>
                                <td><input id="{{$item->associatedModel->id}}" class="form-control text-center quantity" type="text" value="{{$item->quantity}}" /></td>
                                <td class="text-right">$ {{$item->price}} <small>each</small></td>
                                <td class="text-right">
                                    {!! Form::open(['route'=>['cart.destroy',$item->associatedModel->id],'method'=>'DELETE']) !!}
                                       {!! Form::button('<i class="fa fa-trash"></i>',['class'=>'btn btn-sm btn-danger','type'=>'submit']) !!}
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="col-md-4 mt-4">
                <div class="row">
                    <div class="col-sm-12">
                        <a class="btn btn-block btn-danger" href="{{route('cart.clear')}}">Clear Cart</a>
                    </div>
                    <div class="col-12 my-4">
                        <div class="row">
                            <p class="col"><strong>Sub-total : </strong></p>
                            <p class="col"><strong>$ <span class="subtotal">{{$subtotal}}</span></strong></p>
                        </div>
                        <div class="row my-2">
                            <p class="col"><strong>Shipping : </strong></p>
                            <p class="col"><strong><del>$200</del></strong></p>
                        </div>
                        <div class="row my-2">
                            <h4 class="col"><strong>Total : </strong></h4>
                            <h3 class="col"><strong>$ <span class="total">{{$total}}</span></strong></h3>
                        </div>
                        <hr>
                    </div>

                    <div class="col-sm-12 mb-4">
                        <div class="row justify-content-center">
                            <i class="fab fa-cc-visa col-4" style="font-size: 50px; color:navy;"></i>
                            <i class="fa fa-cc-amex col-4" style="font-size: 50px; color:blue;"></i>
                            <i class="fa fa-cc-mastercard col-4" style="font-size: 50px; color:red;"></i>
                        </div>
                    </div>
                    <div class="col-sm-12 text-right">
                        <button class="btn btn-lg btn-block btn-success">Proceed to checkout</button>
                    </div>
                </div>



            </div>
        </div>
        @else
            <div class="row w-100 align-items-center justify-content-center" style="min-height: 60vh">
                <div class="col-md-8">
                    <h4 class="text-center">Your cart is currently empty</h4>
                </div>
            </div>

            @endif
    </div>
    @stop
@section('scripts')
    <script>
        $(document).ready(function () {
           $('.quantity').change(function () {
               let item = $(this);
               const patch = {quantity:item.val(),"_token": $('#token').val()};
               let id = item.attr('id');
               $.ajax({
                   type: 'PATCH',
                   url: `cart/${id}`,
                   data: JSON.stringify(patch),
                   processData: false,
                   contentType: 'application/json-patch+json',
                   success : function (data) {
                       $('.subtotal').text(data.subtotal);
                      $('.total').text(data.total);
                   }
               });
           });
        })
    </script>

    @stop
