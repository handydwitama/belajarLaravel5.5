@extends('layouts.app-nosidebar')

@section('header')
	@include('temp.header_admin')
@endsection

@section('leftbar')
	
@endsection

@section('content')
	<h1>-Catalog-</h1>
	<input type="button" onclick="location.href='{{ route('add.barang') }}';" value="Add Barang" />
	<br>
	<br>
	<table border='1' Width='600'>  
        <tr class = "text-center">   
            <th class = "text-center"> Nomor </th>
            <th class = "text-center"> Nama Barang</th>
            <th class = "text-center"> Stock </th>
           	<th class = "text-center"> Harga </th>   
           	<th class = "text-center"> Action </th>     
        </tr>
                
        <?php $no=1; ?>
        @foreach ($barangs as $barang)                     
	       	<tr>
		      	<td align='center'>{{ $no }}</td>
		        <td align='center'>{{ $barang['nama_barang'] }}</td>
		        <td align='center'>{{ $barang['stock'] }}</td>
		        <td align='center'>{{ $barang['harga'] }}</td>
		        <td align='center'> 
                <a href='{{ route("edit.barang", ["id_barang" => $barang["id_barang"]]) }}'>Edit</a> &nbsp; 
                <a href='{{ route("remove.barang", ["id_barang" => $barang["id_barang"]]) }}'>Remove</a></td>
	        </tr>
	        <?php $no++; ?>
        @endforeach
                
    </table>
    <br><br>
    <input type="button" onclick="location.href='{{ route('admin.dashboard') }}';" value="Back" />
		
@endsection

@section('rightbar')
	
@endsection