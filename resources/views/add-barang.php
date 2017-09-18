@extends('layouts.app')

@section('header')
	@include('temp.header')
@endsection

@section('leftbar')
	
@endsection

@section('content')
	<h1>WELCOME {{Auth::user()->name}}</h1>

	<button onclick = "location.href='{{ route('user.pembelian') }}';">Mulai Pembelian</button>
@endsection

@section('rightbar')
	
@endsection