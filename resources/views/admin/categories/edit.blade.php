@extends('layouts.admin_lte')

@section('header_admin')
    <h1>Edit category</h1>
@endsection

@section('content_admin')
    <form method="post" enctype="multipart/form-data"
          action="{{ route('admin.categories.update', ['category' => $category->id]) }}">
        @method('PUT')
        @csrf
        <div class="form-group">
            <input type="text" class="form-control" name="title" placeholder="title"
                   required maxlength="100" value="{{ old('title') ?? $category->title }}">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </form>

@endsection
