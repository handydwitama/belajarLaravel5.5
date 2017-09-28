@extends('layouts.app-admin')

@section('header')
	@include('temp.header-admin')
@endsection

@section('leftbar')
	@include('temp.leftbar-admin')
@endsection

@section('content')
	<h1>Add Barang</h1>
	{!! Form::open(['url' => route('add.barang')]) !!}
	{{ csrf_field() }}
			<div class="form-group">
				{{ Form::label('name', 'Nama Barang') }}
				{{ Form::text('name', '', ['type' => 'text', 'class' => 'form-control']) }}
			</div>			
			<div class="form-group">
				{{ Form::label('stock', 'Stock') }}
				{{ Form::text('stock', '', ['class' => 'form-control']) }}
			</div>
			<div class="form-group">
				{{ Form::label('harga', 'Harga') }}
				{{ Form::text('harga', '', ['class' => 'form-control']) }}
			</div>			
			<div>
				{{ Form::submit('Submit', ['class' => 'btn'])}}			
				<a href="{{ route('admin.listbarang') }}" class="button btn">Cancel</a>				
			</div>	
	{!! Form::close() !!}
@endsection

@section('footer')
	@include('temp.footer-admin')
@endsection

@section('controlbar')
	@include('temp.controlbar-admin')
@endsection