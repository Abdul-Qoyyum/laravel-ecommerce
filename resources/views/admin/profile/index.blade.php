@extends('layouts.admin')

@section('content')


    <div class="panel-header panel-header-sm">
    </div>
    <div class="content">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h5 class="title">Edit Profile</h5>
                    </div>
                    <div class="card-body">
{{--                        <form>--}}
                        {!! Form::model($user,['route'=>['profile.update',$user->id],'method'=>'PATCH']) !!}
                            <div class="row">
                                <div class="col-md-6 pr-1">
                                    <div class="form-group">
                                        {!! Form::label('name','Name') !!}
                                        {!! Form::text('name',null,['class'=>'form-control','placeholder'=>'name']) !!}
                                    </div>
                                </div>
                                <div class="col-md-6 pr-1">
                                    <div class="form-group">
                                        {!! Form::label('email','Email') !!}
                                        {!! Form::text('email',null,['class'=>'form-control','placeholder'=>'name','disabled'=>'true']) !!}
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
{{--                        </form>--}}

                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-user">
                    <div class="image">
                        <img src="../assets/img/bg5.jpg" alt="...">
                    </div>
                    <div class="card-body">
                        <div class="author">
                            <a href="#">
                                <img class="avatar border-gray" src="../assets/img/mike.jpg" alt="...">
                                <h5 class="title">{{$user->name}}</h5>
                            </a>
                            <p class="description">
                                <strong>Role:</strong> {{$user->role->name}}
                            </p>
                        </div>
                        <p class="description text-center">
                            "Lamborghini Mercy <br>
                            Your chick she so thirsty <br>
                            I'm in that two seat Lambo"
                        </p>
                    </div>
                    <hr>
                    <div class="button-container">
                        <button href="#" class="btn btn-neutral btn-icon btn-round btn-lg">
                            <i class="fab fa-facebook-f"></i>
                        </button>
                        <button href="#" class="btn btn-neutral btn-icon btn-round btn-lg">
                            <i class="fab fa-twitter"></i>
                        </button>
                        <button href="#" class="btn btn-neutral btn-icon btn-round btn-lg">
                            <i class="fab fa-google-plus-g"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop

