@extends('layouts.admin')

@section('content')
    <div class="panel-header panel-header-sm">
    </div>
    <div class="content">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h5 class="title">Update Category</h5>
                    </div>
                    <div class="card-body">
                        {!! Form::model($category,['route'=>['categories.update',$category->id],'method'=>'patch','id'=>'categoryForm']) !!}
                        <div class="row">
                            <div class="col-md-8 pr-1">
                                @error('name')
                                    @php($name = 'is-invalid')
                                    @php($msg_name = $message)
                                @enderror
                                <div class="form-group">
                                    {!! Form::text('name', null, ['class'=>"form-control " . ($name ?? ''),'placeholder'=>"Category Name",'required'=>true]) !!}
                                </div>
                                <small class="text-primary">{{$msg_name ?? ''}}</small>
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
@section('scripts')
    @include('includes.admin_categories_scripts')
@stop
