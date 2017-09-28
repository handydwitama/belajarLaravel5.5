@extends('layouts.app-admin')

@section('header')
	@include('temp.header-admin')
@endsection

@section('leftbar')
	@include('temp.leftbar-admin')
@endsection

@section('content')
	<center>
		<input type="button" onclick="location.href='{{ route('add.barang') }}';" value="Add Barang" />
	</center>
	<div class="box-header">
        <h3 class="box-title">Data Barang</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <table id="example1" class="table table-bordered table-hover">
			<thead>		
				<tr>
					<th>No.</th>
					<th>Nama Barang</th>
					<th>Stock</th>
					<th>Harga</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php $no=1; ?>
				@foreach($barangs as $barang)
					<tr>
						<td>{{ $no }}</td>
						<td>{{ $barang['nama_barang'] }}</td>
						<td>{{ $barang['stock'] }}</td>
						<td>{{ $barang['harga'] }}</td>
						<td> 
						<a href='{{ route("edit.barang", ["id" => $barang["id"]]) }}'>Edit</a> &nbsp; 
						@if (Auth::user()->name=="adminHandy")		<!--buat privilege-->
							<script>
								var x = document.getElementsByClassName('ex');
							</script>				
							<a href="{{ route('remove.barang') }}" onclick="event.preventDefault(); x[{{ $no-1 }}].submit();">
							Delete</a>
							<form id="delete-form" class="ex" action="{{ route('remove.barang') }}" method="POST">
								<input type = 'hidden' name = 'id' value = '{{ $barang["id"] }}'>
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
					<th>Nama Barang</th>
					<th>Stock</th>
					<th>Harga</th>
					<th>Action</th>
				</tr>
			</tfoot>
        </table>
    </div>
	</div>
	<div class="box">
	<div class="box-header">
        <h3 class="box-title">Deleted Barang</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <table id="example2" class="table table-bordered table-hover">
			<thead>		
				<tr>
					<th>No.</th>
					<th>Nama Barang</th>
					<th>Stock</th>
					<th>Harga</th>
					<th>Deleted At</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php $no=1; ?>
				@foreach($deleted as $del)
					<tr>
						<td>{{ $no }}</td>
						<td>{{ $del['nama_barang'] }}</td>
						<td>{{ $del['stock'] }}</td>
						<td>{{ $del['harga'] }}</td>
						<td>{{ $del['deleted_at'] }}</td>
						<td>						 
						@if (Auth::user()->name=="adminHandy")		<!--buat privilege-->
							<script>
								var y = document.getElementsByClassName('res');
							</script>				
							<a href="{{ route('restore.barang') }}" onclick="event.preventDefault(); y[{{ $no-1 }}].submit();">
							Restore</a>
							<form id="restore-form" class="res" action="{{ route('restore.barang') }}" method="POST">
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
					<th>Nama Barang</th>
					<th>Stock</th>
					<th>Harga</th>
					<th>Deleted At</th>
					<th>Action</th>
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