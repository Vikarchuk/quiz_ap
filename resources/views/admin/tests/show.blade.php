@extends('layouts.admin_lte')
@section('header_admin')
    <h1>Test</h1>
@stop
@section('content_admin')
    <div class="row">
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('admin.tests.index') }}" title="Go back"> <i class="fas fa-backward "></i> </a>
        </div>
        <div class="col-md-6">
            <p><strong>ID:</strong> {{ $test->id }}</p>
            <p><strong>Name:</strong> {{ $test->title }}</p>
            <p><strong>Category:</strong> {{ $test->category_id }}</p>
            <p><strong>Content:</strong>
        </div>
    </div>
@stop
