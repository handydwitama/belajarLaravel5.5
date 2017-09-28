@extends('layouts.app-admin')

@section('header')
	@include('temp.header-admin')
@endsection

@section('leftbar')
	@include('temp.leftbar-admin')
@endsection

@section('content')
	<div class="box-header">
        <h3 class="box-title">Data Transaksi {{ $trans }}, Nama : {{ $nama }}, Tanggal : {{ $tanggal }}</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <table id="example1" class="table table-bordered table-hover">
			<thead>		
				<tr>
					<th>No.</th>
					<th>Nama Barang</th>
					<th>Harga Barang</th>
					<th>Quantity</th>
					<th>Jumlah Pembelian</th>
				</tr>
			</thead>
			<tbody>
				<?php $no = 1;  ?>	
				@foreach($lists as $list)                     
					<tr>
						<td>{{ $no }}</td>
						<td>{{ $list['masterBarang']['nama_barang'] }}</td>
						<td>{{ $list['masterBarang']['harga'] }}</td>
						<td>{{ $list['qty'] }}</td>
						<td>{{ $list['jumlah'] }}</td>
					</tr>   
					<?php $no++; ?>	 					
				@endforeach    
			<tfoot>
				<tr>
                	<th>No.</th>
					<th>Nama Barang</th>
					<th>Harga Barang</th>
					<th>Quantity</th>
					<th>Jumlah Pembelian</th>
				</tr>
			</tfoot>
        </table>
    </div>
</div>
<div class="row">
    <center>
        <a href="{{ route('laporan') }}" class="button btn">Back</a>
    </center>
@endsection

@section('footer')
	@include('temp.footer-admin')
@endsection

@section('controlbar')
	@include('temp.controlbar-admin')
@endsection