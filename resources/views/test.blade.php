@extends('layouts.app')

@section('title', 'Page Title')

@section('sidebar')
    @parent


    <p>This is appended to the master sidebar.</p>

    Hello, {{ $name }}.
@endsection

@section('content')
    <p>This is my body content.</p>
@endsection


