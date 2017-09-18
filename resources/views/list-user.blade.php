@extends('layouts.app-nosidebar')

@section('header')
	@include('temp.header_admin')
@endsection

@section('leftbar')
	
@endsection

@section('content')
	<h1>-Registered Users-</h1>
	<br>
	<table border='1' Width='1000'>  
                <tr class = "text-center">   
                    <th class = "text-center"> Nomor </th>
                    <th class = "text-center"> Email </th>
                    <th class = "text-center" width="10%"> Password </th>
                    <th class = "text-center"> Nama </th>
                    <th class = "text-center"> Umur </th>
                    <th class = "text-center"> Alamat </th>
                    <th class = "text-center"> Action </th>
                </tr>
                <?php $no = 1; ?>
                @foreach ($users as $user) 
                    <?php $pwd = md5($user['password']); ?>
                    <tr>
	                    <td align='center'>{{ $no }}</td>
	                    <td align='center'>{{ $user['email'] }}</td>
	                    <td align='center'>{{ $pwd }}</td>
	                    <td align='center'>{{ $user['name'] }}</td>
	                    <td align='center'>{{ $user['umur'] }}</td>
	                    <td align='center'>{{ $user['alamat'] }}</td>
	                    <td align='center'>
	                    <a href='{{ route("edit.user", ["id" => $user["id"]]) }}'>Edit</a> &nbsp; 
	                    <a href='{{ route("remove.user", ["id" => $user["id"]]) }}'>Remove</a></td>
                    </tr>
                    <?php $no++; ?>
                @endforeach                
            </table>
            <br><br>
            <input type="button" onclick="location.href='{{ route('admin.dashboard') }}';" value="Back" />
@endsection

@section('rightbar')
	
@endsection