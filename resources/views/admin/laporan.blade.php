@extends('layouts.app-admin')

@section('header')
	@include('temp.header-admin')
@endsection

@section('leftbar')
	@include('temp.leftbar-admin')
@endsection

@section('content')
	<div class="box-header">
        <h3 class="box-title">Data Barang</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <table id="example1" class="table table-bordered table-hover">
			<thead>		
				<tr>
					<th>Transaksi ID</th>
					<th>User</th>
					<th>Tanggal Pembelian</th>
					<th>Jumlah Pembelian</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>				
				@foreach($lists as $list)
                    <?php $same = $list[0]['pembelian_id']; ?>  
					<tr>
						<td>{{ $list[0]['pembelian_id'] }}</td>
						<td>{{ $list[0]['user']['name'] }}</td>
						<td>{{ $list[0]['tanggal'] }}</td>
						<td>{{ $list[0]->where('pembelian_id', $same)->sum('jumlah') }}</td>
						<td> 
						<a href='{{ route("detail.laporan", ["id" => $list[0]["pembelian_id"]]) }}'>Lihat Detail</a> 
                        </td>
					</tr>    					
				@endforeach    
			<tfoot>
				<tr>
                <th>Transaksi ID</th>
                <th>User</th>
                <th>Tanggal Pembelian</th>
                <th>Jumlah Pembelian</th>
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