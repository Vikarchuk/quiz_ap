@extends('layouts.admin_lte')

@section('header_admin')
    <h1>Category</h1>
@endsection

@section('content_admin')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Add New</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('admin.categories.index') }}" title="Go back"> <i class="fas fa-backward "></i> </a>
            </div>
        </div>
    </div>
    @include('admin.parts.errorsChecking')
    <form action="{{ route('admin.categories.store') }}" method="POST" >
        @csrf
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Title:</strong>
                    <input type="text" name="title" class="form-control" placeholder="Title">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>

    </form>
@endsection



