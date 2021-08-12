@extends('layouts.admin_lte')

@section('header_admin')
    <h1>Edit test</h1>
@endsection

@section('content_admin')
    <form action="{{ route('admin.tests.update', $test->id) }}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @include('admin.parts.form')
    </form>
@endsection
