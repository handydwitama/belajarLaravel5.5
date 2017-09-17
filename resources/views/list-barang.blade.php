@extends('layouts.app')

@section('header')
	@include('temp.header')
@endsection

@section('leftbar')
	
@endsection

@section('content')

	<table border='1' Width='800'>  
        <tr class = "text-center">   
            <th class = "text-center"> Nomor </th>
            <th class = "text-center"> Nama Barang</th>
            <th class = "text-center"> Stock </th>
           	<th class = "text-center"> Harga </th>        
        </tr>
                
        <?php $no=1; ?>
        @foreach ($barangs as $barang)                     
	       	<tr>
		      	<td align='center'>{{ $no }}</td>
		        <td align='center'>{{ $barang['nama_barang'] }}</td>
		        <td align='center'>{{ $barang['stock'] }}</td>
		        <td align='center'>{{ $barang['harga'] }}</td>
	        </tr>
	        <?php $no++; ?>
        @endforeach
                
    </table>
		
@endsection

@section('rightbar')
	
@endsection