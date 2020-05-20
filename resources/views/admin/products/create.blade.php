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
                    {!! Form::open(['route'=>'products.create','files'=>true]) !!}
                        <div class="row">
                            <div class="col-md-8 pr-1 pl-1">
                                <div class="form-group">
                                    {!! Form::label('name','Name') !!}
                                    {!! Form::text('name',null,['class'=>'form-control','placeholder'=>'name']) !!}
                                </div>
                            </div>
                            <div class="col-md-8 pl-1 pr-1">
                                <div class="form-group">
                                    {!! Form::label('price','Price') !!}
                                    {!! Form::text('price',null,['class'=>'form-control','placeholder'=>'price']) !!}
                                </div>
                            </div>
                            <div class="col-md-8 pl-1 pr-1">
                                <div class="form-group">
                                    {!! Form::label('thumbnail','Thumbnail') !!}
                                    {!! Form::file('thumbnail',null,['class'=>'form-control','placeholder'=>'thumbnail']) !!}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    {!! Form::label('description','Description') !!}
                                    {!! Form::textarea('description',null,['class'=>'form-control','placeholder'=>'Here can be your description']) !!}
                                </div>
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
</div>
    @stop
