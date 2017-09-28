@extends('layouts.app-admin')

@section('header')
	@include('temp.header-admin')
@endsection

@section('leftbar')
	@include('temp.leftbar-admin')
@endsection

@section('content')
	<div class="box-header">
        <h3 class="box-title">Data User</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <table id="example1" class="table table-bordered table-striped">
        <thead>		
			<tr>
				<th>No.</th>
				<th>Name</th>
				<th>Email</th>				
				<th>Umur</th>
				<th>Alamat</th>
				<th>Action</th>
			</tr>
        </thead>
        <tbody>
			<?php $no=1; ?>
			@foreach($users as $user)
				<tr>
					<td>{{ $no }}</td>
					<td>{{ $user['name'] }}</td>
					<td>{{ $user['email'] }}</td>					
					<td>{{ $user['umur'] }}</td>
					<td>{{ $user['alamat'] }}</td>
					<td><a href= '{{ route("edit.user",  ["id" => $user["id"]]) }}'>Edit</a>&nbsp;
					@if (Auth::user()->name=="adminHandy")		<!--buat privilege-->
						<script>
							var x = document.getElementsByClassName('ex');
						</script>				
						<a href="{{ route('remove.user') }}" onclick="event.preventDefault(); x[{{ $no-1 }}].submit();">
						Delete</a>
						<form id="delete-form" class="ex" action="{{ route('remove.user') }}" method="POST">
							<input type = 'hidden' name = 'id' value = '{{ $user["id"] }}'>
                    		{{ csrf_field() }}
                  		</form>				
					@endif
					</td>
				</tr>    
				<?php $no++; ?>
			@endforeach    
        <tfoot>
			<tr>
				<th>No.</th>
				<th>Name</th>
				<th>Email</th>
				<th>Password</th>
				<th>Umur</th>
				<th>Alamat</th>
			</tr>
        </tfoot>
        </table>
    </div>
	</div>
	<div class="box">
	<div class="box-header">
        <h3 class="box-title">Deleted User</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <table id="example2" class="table table-bordered table-striped">
        <thead>		
			<tr>
				<th>No.</th>
				<th>Name</th>
				<th>Email</th>				
				<th>Umur</th>
				<th>Alamat</th>
				<th>Deleted At</th>
				<th>Action</th>
			</tr>
        </thead>
        <tbody>
			<?php $no=1; ?>
			@foreach($deleted as $del)
				<tr>
					<td>{{ $no }}</td>
					<td>{{ $del['name'] }}</td>
					<td>{{ $del['email'] }}</td>					
					<td>{{ $del['umur'] }}</td>
					<td>{{ $del['alamat'] }}</td>
					<td>{{ $del['deleted_at'] }}</td>
					<td>
					@if (Auth::user()->name=="adminHandy")		<!--buat privilege-->
						<script>
							var y = document.getElementsByClassName('res');
						</script>				
						<a href="{{ route('restore.user') }}" onclick="event.preventDefault(); y[{{ $no-1 }}].submit();">
						Restore</a>
						<form id="restore-form" class="res" action="{{ route('restore.user') }}" method="POST">
							<input type = 'hidden' name = 'id' value = '{{ $del["id"] }}'>
                    		{{ csrf_field() }}
                  		</form>				
					@endif
					</td>
				</tr>    
				<?php $no++; ?>
			@endforeach    
        <tfoot>
			<tr>
				<th>No.</th>
				<th>Name</th>
				<th>Email</th>
				<th>Password</th>
				<th>Umur</th>
				<th>Alamat</th>
			</tr>
        </tfoot>
        </table>
    </div>	
@endsection

@section('footer')
	@include('temp.footer-admin')
@endsection

@section('controlbar')
	@include('temp.controlbar-admin')
@endsection