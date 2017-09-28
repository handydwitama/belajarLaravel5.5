@extends('layouts.app-admin')

@section('header')
	@include('temp.header-admin')
@endsection

@section('leftbar')
	@include('temp.leftbar-admin')
@endsection

@section('content')
	<h1>Edit Profile User</h1>
	{!! Form::open(['url' => route('edit.user')]) !!}
	{{ csrf_field() }}
		@foreach($users as $user)
			<div class="form-group">
				{{ Form::label('name', 'Name') }}
				{{ Form::text('name', $user['name'], ['type' => 'text', 'class' => 'form-control']) }}
			</div>
			<div class="form-group">
				{{ Form::label('email', 'E-Mail Address') }}
				{{ Form::text('email',  $user['email'], ['class' => 'form-control', 'placeholder' => 'Enter Email', 'readonly']) }}
			</div>			
			<div class="form-group">
				{{ Form::label('umur', 'Umur') }}
				{{ Form::text('umur', $user['umur'], ['class' => 'form-control']) }}
			</div>
			<div class="form-group">
				{{ Form::label('alamat', 'Alamat') }}
				{{ Form::textarea('alamat', $user['alamat'], ['class' => 'form-control']) }}
			</div>
			<div class="form-group">
				{{ Form::label('password1', 'Password') }}
				{{ Form::password('password', ['placeholder' => '***************']) }}
			</div>
			<div>
				{{ Form::submit('Submit', ['class' => 'btn'])}}			
				<a href="{{ route('listuser') }}" class="button btn">Cancel</a>				
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