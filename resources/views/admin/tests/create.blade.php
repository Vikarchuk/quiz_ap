@extends('layouts.admin_lte')

@section('header_admin')
    <h3>Create test</h3>
@endsection

@section('content_admin')
    <div id="app">
        <example-component></example-component>
    </div>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Add New</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('admin.tests.index') }}" title="Go back"> <i class="fas fa-backward "></i> </a>
            </div>
        </div>
    </div>
    @include('admin.parts.errorsChecking')
    <form action="{{ route('admin.tests.store') }}" method="POST" enctype="multipart/form-data">
        @include('admin.parts.form')
    </form>
@endsection
