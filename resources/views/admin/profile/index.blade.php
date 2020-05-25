@extends('layouts.admin')

@section('content')


    <div class="panel-header panel-header-sm">
    </div>
    <div class="content">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h5 class="title">Update Profile</h5>
                    </div>
                    <div class="card-body">
                        {!! Form::model($user,['route'=>['profile.update',$user->id],'method'=>'PATCH','files'=>true]) !!}
                            <div class="row">
                                <div class="col-md-6 pr-1">
                                    <div class="form-group">
                                        @php($name_error = '')
                                        @error('name')
                                        @php($name_error = $message)
                                        @enderror
                                        {!! Form::label('name','Name') !!}
                                        {!! Form::text('name',null,['class'=>'form-control ' . ($name_error ? 'is-invalid' : ''),'placeholder'=>'name']) !!}
                                        <small class="error">{{$name_error}}</small>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 pr-1">
                                    <div class="form-group">
                                        {!! Form::label('password','Password') !!}
                                        {!! Form::password('password',['class'=>'form-control','placeholder'=>'**********']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 pr-1">
                                    <div class="form-group">
                                        {!! Form::label('url','Select Image',['class'=>'btn btn-secondary btn-round',"style"=>"color:white"]) !!}
                                        {!! Form::file('url') !!}
                                    </div>
                                </div>
                            </div>
                           <div class="row col-md-6 pr-1">
                               <div class="form-group">
                                   {!! Form::submit('Update',['class'=>'btn btn-primary btn-round']) !!}
                               </div>
                           </div>

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-user">
                    <div class="image">
                        <img src="/assets/img/bg5.jpg" alt="...">
                    </div>
                    <div class="card-body">
                        <div class="author">
                            <a href="#">
                                <img class="avatar border-gray" src="{{ $user->image->url ?? '/assets/img/default-avatar.png'}}" alt="...">
                                <h5 class="title">{{$user->name}}</h5>
                            </a>
                            <p class="description">
                                <strong>Role:</strong> {{$user->role->name}}
                            </p>
                        </div>
                    </div>
                    <hr>
                </div>
            </div>
        </div>
    </div>

@stop

