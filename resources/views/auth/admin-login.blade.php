@extends('layouts.app')

@section('leftbar')
	
@endsection

@section('content')

	<h1>Admin Login (Restricted)</h1>
	{!! Form::open(['url' => '/admin/login']) !!}
	{{ csrf_field() }}
		<div class="form-group">
			{{ Form::label('email', 'E-Mail Address') }}
			{{ Form::text('email', '', ['class' => 'form-control', 'placeholder' => 'Enter Email']) }}
		</div>
		<div class="form-group">
			{{ Form::label('password1', 'Password') }}
			{{ Form::password('password', ['placeholder' => '**********']) }}
		</div>
		<div>
			{{ Form::submit('Submit', ['class' => 'btn'])}}
		</div>

	{!! Form::close() !!}
		<div class="form-group">
			<a class="btn btn-link" href="{{ route('admin.password.request') }}">
	            Forgot Your Password?
	        </a>
        </div>
@endsection

@section('rightbar')
	
@endsection