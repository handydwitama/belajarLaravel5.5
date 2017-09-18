@extends('layouts.app-nosidebar')

@section('header')
    @include('temp.header')
@endsection

@section('leftbar')
    
@endsection

@section('content')
    <center> 
            <h3>History Pembelian User : {{ Auth::user()->name }}</h3>
            <br>         
            <table align="center" border='1' Width='800'>  
            <tr>
                <th class = "text-center"> ID Transaksi </th>
                <th style="width:20%" class = "text-center"> Tanggal </th>                
                <th class = "text-center"> Nama Barang </th>
                <th class = "text-center"> Quantity </th>
                <th class = "text-center"> Total Belanja </th>
            </tr>

            <script type="text/javascript">
            var quan = document.getElementById('num[]');
            var asd = quan[0].innerHTML;
            </script>
            <?php $no = 1; ?>      
            @foreach($barangs as $row)            
                <tr>
                <td align='center'>{{ $row['id_pembelian'] }}</td>
                <td align='center'>{{ $row['tanggal'] }}</td>                    
                <td align='center'>{{ $row['nama_barang'] }}</td>
                <td align='center'><input type='number' id='num[]' name='{{ $row["nama_barang"] }}' min='1' max='10' step='1' value='{{ $row["qty"] }}' readonly></td>
                <td align='center'>{{ $row['jumlah'] }}</td>                
                </tr>
            @endforeach
            <?php $no++; ?>        
            
            </table>            
            <br><br>
            <a href='{{ route('printpdf.user') }}'>Print PDF</a>           
            <br>
            <br>

            <input type="button" onclick="location.href='{{ route('home') }}';" value="Back" />
@endsection

@section('rightbar')
    
@endsection