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
                    <form>
                        <div class="row">
                            <div class="col-md-8 pr-1 pl-1">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" name="name" class="form-control" placeholder="name" value="">
                                </div>
                            </div>
                            <div class="col-md-8 pl-1 pr-1">
                                <div class="form-group">
                                    <label>Price</label>
                                    <input type="text" name="price" class="form-control" placeholder="price" value="">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Description :</label>
                                    <textarea rows="4" cols="80" class="form-control" name="description" placeholder="Here can be your description" value=""></textarea>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
</div>
    @stop
