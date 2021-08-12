@extends('adminlte::page')

@section('title', 'Admin')

@section('content_header')
    @yield('header_admin')
@stop

@section('content')
    @yield('content_admin')
@stop

@section('css')
    /*<link rel="stylesheet" href="/css/admin_custom.css">*/
@stop

@section('js')
{{--    <script> console.log('Hi!'); </script>--}}
@stop
