@extends('layouts.admin')

@section('content')
    <div class="panel-header panel-header-sm">
    </div>
    <div class="content">
        <div class="row">
            <div class="col-md-5">
                <div class="card">
                    <div class="card-header">
                        <h5 class="title">Create Category</h5>
                    </div>
                    <div class="card-body">
                            {!! Form::open(['route'=>'categories.store','id'=>'categoryForm']) !!}
                            <div class="row">
                                <div class="col-md-8 pr-1">
                                    <div class="form-group">
                                        @error('name')
                                            @php($name = 'is-invalid')
                                            @php($msg_name = $message)
                                        @enderror
                                        {!! Form::text('name', null, ['class'=>"form-control " . ($name ?? ''),'placeholder'=>"Category Name","id"=>"name"]) !!}
                                        <small class="text-primary">{{$msg_name ?? ''}}</small>
                                    </div>
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

            <div class="col-md-7">
                <div class="card">
                    <div class="card-header">
                        <h5 class="title">Categories</h5>
                    </div>
                    <div class="card-body">
                        @if(count($categories))
                        <table class="table">
                            <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th>Name</th>
                                <th>Created at</th>
                                <th class="text-center">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php($i = 0)
                          @foreach($categories as $category)
                            <tr>
                                <td class="text-center">{{++$i}}</td>
                                <td class="text-capitalize">{{$category->name}}</td>
                                <td>{{$category->created_at->diffForHumans()}}</td>
                                <td class="td-actions row">
                                    {!! Form::open(['route'=>['categories.edit',$category->id],'method'=>'get']) !!}
                                      {!! Form::button('<i class="now-ui-icons ui-2_settings-90"></i>',['type' => 'submit','class'=>'ml-1 btn btn-success mb-2 col-xs-6','rel'=>'tooltip']) !!}
                                    {!! Form::close() !!}

                                {!! Form::open(['route'=>['categories.destroy',$category->id],'method'=>'delete']) !!}
                                      {!! Form::button('<i class="now-ui-icons ui-1_simple-remove"></i>',['class'=>'ml-1 btn btn-danger col-xs-6','type' => 'submit','rel'=>'tooltip']) !!}
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                              @endforeach
                            </tbody>
                        </table>
                            @endif
                    </div>
                    <hr>
                </div>
            </div>
        </div>
    </div>

@stop
@section('scripts')
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <script>
        $(document).ready(function(){
            $("#categoryForm").validate({
                rules : {
                    name: {
                        required: true,
                        minlength: 2
                    }
                },
                    messages : {
                        name : {
                            required : "Please specify the category name",
                            minlength : "Enter at least two characters"
                        }
                    }

          })
        })
    </script>
    @stop
