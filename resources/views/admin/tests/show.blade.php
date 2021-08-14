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
        </div>
    </div>
    <div>
        <table class="table table-hover">
            <tbody><tr>
                <th>ID</th>
                <th>Text</th>
                <th>Action</th>
            </tr>
            @foreach ($test->questions as $question)
                <tr>
                    <td>{{ $question->id }}</td>
                    <td>{{ $question->text }}</td>
                    <td>
                        <form action="{{ route('admin.questions.destroy', $question->id) }}" method="POST">
{{--                            <a href="{{ route('admin.questions.show', $question->id) }}" title="show">--}}
{{--                                <i class="fas fa-eye text-success  fa-lg"></i>--}}
{{--                            </a>--}}
                            <a href="{{ route('admin.questions.edit', $question->id) }}">
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
        <form action="{{ route('admin.questions.store') }}" method="POST" >
            @csrf
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <input type="hidden" name="test_id" value="{{$test->id}}">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Question:</strong>
                        <input type="text" name="text" class="form-control" placeholder="text">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Answer:</strong>
                        <input type="text" name="answer" class="form-control" placeholder="answer">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>

        </form>
    </div>
@stop
