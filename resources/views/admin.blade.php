@extends('layouts.app')

@section('header')
	@include('temp.header_admin')
@endsection

@section('leftbar')
	
@endsection

@section('content')
	<h1>WELCOME {{Auth::user()->name}}</h1>
@endsection

@section('rightbar')
	
@endsection