@extends('layouts.admin')

@section('content')
    <div class="panel-header panel-header-sm">
    </div>
    <div class="content">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h5 class="title">Update Product</h5>
                    </div>
                    <div class="card-body">
                        {!! Form::model($product,['route'=>['products.update',$product->slug], 'files'=>true,'id'=>'createProductForm','method'=>'PATCH']) !!}
                        <div class="row">
                            <div class="col-md-8 pr-1 pl-1">
                                <div class="form-group">
                                    @error('name')
                                        @php($name = 'is-invalid')
                                        @php($msg_name  = $message)
                                    @enderror
                                    {!! Form::label('name','Name') !!}
                                    {!! Form::text('name',null,['class'=>'form-control ' . ($name ?? '') ,'placeholder'=>'name']) !!}
                                    <small class="text-primary">{{$msg_name ?? ''}}</small>
                                </div>
                            </div>
                            <div class="col-md-8 pl-1 pr-1">
                                <div class="form-group">
                                    @error('price')
                                        @php($price = 'is-invalid')
                                        @php($msg_price = $message)
                                    @enderror
                                    {!! Form::label('price','Price') !!}
                                    {!! Form::text('price',null,['class'=>'form-control ' . ($price ?? ''),'placeholder'=>'price']) !!}
                                    <small class="text-primary">{{$msg_price ?? ''}}</small>
                                </div>
                            </div>
                            <div class="col-md-8 pl-1 pr-1">
                                <div class="form-group">
                                    @error('category_id')
                                        @php($category_id = 'is-invalid')
                                        @php($msg_category_id = $message)
                                    @enderror
                                    {!! Form::label('category_id','Category') !!}
                                    {!! Form::select('category_id', $select, null, ['class'=>'form-control text-capitalize ' . ($category_id ?? ''),'placeholder'=>'Select Category', 'id'=>'category_id']) !!}
                                    <small class="text-primary">{{$msg_category_id ?? ''}}</small>
                                </div>
                            </div>
                            <div class="col-md-8 pl-1 pr-1">
                                <div class="form-group">
                                    @error('first_url')
                                    @php($first_url = 'is-invalid')
                                    @php($msg_first_url = $message)
                                    @enderror
                                    {!! Form::label('first_url','First Image',['class'=>'btn btn-secondary btn-round',"style"=>"color:white"]) !!}
                                    {!! Form::file('first_url',null,['class'=>'form-control ' . ($first_url ?? ''),'placeholder'=>'Image']) !!}
                                    <small class="text-primary">{{$msg_first_url ?? ''}}</small>
                                </div>
                            </div>
                            <div class="col-md-8 pl-1 pr-1">
                                <div class="form-group">
                                    @error('second_url')
                                    @php($first_url = 'is-invalid')
                                    @php($msg_second_url = $message)
                                    @enderror
                                    {!! Form::label('second_url','Second Image',['class'=>'btn btn-secondary btn-round',"style"=>"color:white"]) !!}
                                    {!! Form::file('second_url',null,['class'=>'form-control ' . ($first_url ?? ''),'placeholder'=>'Image']) !!}
                                    <small class="text-primary">{{$msg_second_url ?? ''}}</small>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    @error('description')
                                        @php($description = 'is-invalid')
                                        @php($msg_description = $message)
                                    @enderror
                                    {!! Form::label('description','Description') !!}
                                    {!! Form::textarea('description',$product->photo->description,['class'=>'form-control ' . ($description ?? ''),'placeholder'=>'Here can be your description about the product']) !!}
                                    <small class="text-primary">{{$msg_description ?? ''}}</small>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8 pl-1 pr-1">
                                <div class="form-group">
                                    {!! Form::submit('Update',['class'=>'btn btn-primary btn-round ml-1']) !!}
                                </div>
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
        @stop
        @section('scripts')
            @include('includes.edit_products_scripts')
        @stop
