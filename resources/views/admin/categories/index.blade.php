@extends('layouts.admin_lte')

@section('header_admin')
    <h1>Categories</h1>
@endsection

@section('content_admin')
    {{--    <p>Welcome</p>--}}

    <div class="col-xs-12">
        <div class="box">
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('admin.categories.create') }}" title="Create a category"> <i class="fas fa-plus-circle"></i>
                </a>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
                <table class="table table-hover">
                    <tbody><tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Action</th>
                    </tr>
                    @foreach ($categories as $category)
                        <tr>
                            <td>{{ $category->id }}</td>
                            <td>{{ $category->title }}</td>
                            <td>
                                <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST">

                                    <a href="{{ route('admin.categories.show', $category->id) }}" title="show">
                                        <i class="fas fa-eye text-success  fa-lg"></i>
                                    </a>
                                    <a href="{{ route('admin.categories.edit', $category->id) }}">
                                        <i class="fas fa-edit  fa-lg"></i>
                                    </a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" title="delete" style="border: none; background-color:transparent;">
                                        <i class="fas fa-trash fa-lg text-danger"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody></table>
            </div>
        </div>
    </div>
@endsection
