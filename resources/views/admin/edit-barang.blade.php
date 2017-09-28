@extends('layouts.app-admin')

@section('header')
	@include('temp.header-admin')
@endsection

@section('leftbar')
	@include('temp.leftbar-admin')
@endsection

@section('content')
	<h1>Edit Barang</h1>
	{!! Form::open(['url' => route('edit.barang')]) !!}
	{{ csrf_field() }}
		@foreach($barangs as $barang)
			<div class="form-group">
				{{ Form::label('name', 'Nama Barang') }}
				{{ Form::text('name', $barang['nama_barang'], ['type' => 'text', 'class' => 'form-control', 'readonly']) }}
			</div>			
			<div class="form-group">
				{{ Form::label('stock', 'Stock') }}
				{{ Form::text('stock', $barang['stock'], ['class' => 'form-control']) }}
			</div>
			<div class="form-group">
				{{ Form::label('harga', 'Harga') }}
				{{ Form::text('harga', $barang['harga'], ['class' => 'form-control']) }}
			</div>			
			<div>
				{{ Form::submit('Submit', ['class' => 'btn'])}}			
				<a href="{{ route('admin.listbarang') }}" class="button btn">Cancel</a>				
			</div>			
		@endforeach
	{!! Form::close() !!}
@endsection

@section('footer')
	@include('temp.footer-admin')
@endsection

@section('controlbar')
	@include('temp.controlbar-admin')
@endsection