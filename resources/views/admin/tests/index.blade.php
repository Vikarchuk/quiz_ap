@extends('layouts.admin_lte')
@section('header_admin')
    <h1>Tests</h1>
@stop
@section('content_admin')
    <div class="col-xs-12">
        <div class="box">
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('admin.tests.create') }}" title="Create a test"> <i class="fas fa-plus-circle"></i>
                </a>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
                <table class="table table-hover">
                    <tbody><tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Action</th>
                    </tr>
                    @foreach ($tests as $test)
                        <tr>
                            <td>{{ $test->id }}</td>
                            <td>{{ $test->title }}</td>
                            <td>{{ $test->category_id }}</td>
                            <td>
                                <form action="{{ route('admin.tests.destroy', $test->id) }}" method="POST">
                                    <a href="{{ route('admin.tests.show', $test->id) }}" title="show">
                                        <i class="fas fa-eye text-success  fa-lg"></i>
                                    </a>
                                    <a href="{{ route('admin.tests.edit', $test->id) }}">
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
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
@stop




