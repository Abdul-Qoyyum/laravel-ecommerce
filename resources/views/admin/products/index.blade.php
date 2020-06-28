@extends('layouts.admin')
@section('content')
    <div class="panel-header panel-header-sm">
    </div>
    <div class="content">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        <div class="title">
                            <h4>Products</h4>
                        </div>
                    </div>
                    @if(count($products))
                    <div class="card-body">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th>Thumbnail</th>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th class="text-right">Category</th>
                                    <th class="text-right">Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($products as $key => $product)
                                <tr>
                                    <td class="text-center">{{++$key}}</td>
                                    <td style="height:150px; width:100px"><img class="h-100 w-100 rounded img-thumbnail" src="{{url($product->photo->first_url)}}" alt="Product's Image"></td>
                                    <td>{{$product->name}}</td>
                                    <td>&#8358 {{$product->price}}</td>
                                    <td class="text-right text-capitalize">{{$product->category->name}}</td>
                                    <td class="td-actions row justify-content-center align-items-center">
                                        <div class="col-md-8">
                                            <div class="row justify-content-between align-items-center" style="height: 150px;">
                                        {!! Form::open(['route'=>['products.edit',$product->slug],'method'=>'GET']) !!}
                                            {!! Form::button('<i class="now-ui-icons ui-2_settings-90"></i>',['type'=>'submit','class'=>'btn btn-success','rel'=>'tooltip'])!!}
                                        {!! Form::close() !!}

                                        {!! Form::open(['route'=>['products.destroy',$product->slug],'method'=>'DELETE']) !!}
                                                {!!Form::button('<i class="now-ui-icons ui-1_simple-remove"></i>',['type'=>'submit','class'=>'btn btn-danger','rel'=>'tooltip'])!!}
                                                {!! Form::close() !!}
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        <div class="row">
                          {{$products->links('vendor.pagination.simple-default')}}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    @stop
