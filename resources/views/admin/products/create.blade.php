@extends('layouts.admin')

@section('content')
    <div class="panel-header panel-header-sm">
    </div>
<div class="content">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="title">Add Product</h5>
                </div>
                <div class="card-body">
                    {!! Form::open(['route'=>'products.store','files'=>true,'id'=>'createProductForm']) !!}
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
                                    @error('thumbnail')
                                        @php($thumbnail = 'is-invalid')
                                        @php($msg_thumbnail = $message)
                                    @enderror
                                    {!! Form::label('thumbnail','Thumbnail') !!}
                                    {!! Form::file('thumbnail',null,['class'=>'form-control ' . ($thumbnail ?? ''),'placeholder'=>'thumbnail']) !!}
                                    <small class="text-primary">{{$msg_thumbnail ?? ''}}</small>
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
                                    {!! Form::textarea('description',null,['class'=>'form-control ' . ($description ?? ''),'placeholder'=>'Here can be your description']) !!}
                                    <small class="text-primary">{{$msg_description ?? ''}}</small>
                                </div>
                            </div>
                        </div>
                    <div class="row">
                        <div class="col-md-8 pl-1 pr-1">
                            <div class="form-group">
                                {!! Form::submit('Create',['class'=>'btn btn-primary btn-round ml-1']) !!}
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
        <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
        <script>
            $(document).ready(function(){
                $('#createProductForm').validate({
                    rules : {
                        name : {
                            required : true,
                            minlength : 2
                        },
                        price : {
                            required : true,
                            number : true
                        },
                        thumbnail : {
                            required : true
                        },
                        description : {
                            required : true,
                            minlength : 5
                        }
                    },
                    messages : {
                        name: {
                            required: "Enter the product name",
                            minlength: "Enter at least two characters"
                        },
                        price: {
                            required: "Enter the price"
                        },
                        description : {
                            required : "Enter the description"
                        }
                    }
                })
            })
        </script>
    @stop
