@extends('layouts.admin')

@section('content')
    <div class="panel-header panel-header-sm">
    </div>
    <div class="content">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h5 class="title">Edit Category</h5>
                    </div>
                    <div class="card-body">
                        {!! Form::model($category,['route'=>['categories.update',$category->id],'method'=>'patch']) !!}
                        <div class="row">
                            <div class="col-md-8 pr-1">
                                <div class="form-group">
                                    {!! Form::text('name', null, ['class'=>"form-control",'placeholder'=>"Category Name"]) !!}
                                </div>
                                @error('name')
                                <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2">
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
    </div>

    @stop
