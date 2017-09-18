@extends('layouts.app-nosidebar')

@section('header')
	@include('temp.header_admin')
@endsection

@section('leftbar')
	
@endsection

@section('content')
	<h1>-List Semua Transaksi-</h1>

	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"> 
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        $( function() {
            $( "#startdate" ).datepicker();
            $( "#enddate" ).datepicker();
          } );
        function caritanggal(){
            var startd = $('#startdate').val();
            var d1 = startd.split("/");
            var from = d1[2]+-+d1[0]+-+d1[1];
            
            var endd = $('#enddate').val();
            var d2 = endd.split("/");
            var to = d2[2]+-+d2[0]+-+(parseInt(d2[1])+1);
        
            table = document.getElementById("mytable");
            tr = table.getElementsByTagName("tr");
                for (i = 0; i < tr.length; i++){
                    td = tr[i].getElementsByTagName("td")[2];
                    if (td){
                        if (Date.parse(td.innerHTML) <= Date.parse(to) && Date.parse(td.innerHTML) >= Date.parse(from)){
                            tr[i].style.display = "";
                        
                        } else{
                            tr[i].style.display = "none";
                        }
                    }       
                }
            
        }
    </script>

    SEARCH BERDASARKAN TANGGAL
    <p>Start Date: <input type="text" id="startdate"> End Date: <input type="text" id="enddate"></p>
    <input type="button" onclick="caritanggal()" value="Cari" />
    <br>
    <br>
    <table id="mytable" border='1' Width='800'>  

    <tr>
        <th class = "text-center"> Transaksi ID</th>
        <th class = "text-center"> User </th>
        <th class = "text-center" style="width:30%"> Tanggal Pembelian </th>
        <th class = "text-center"> Jumlah belanja</th>
        <th class = "text-center"> Action </th>    
    </tr>


    <?php $no = 1; ?>

    @foreach ($lists as $list)
            
        <tr>
        <td align='center'>{{ $list['id_pembelian'] }}</center></td> 
        <td align='center'>{{ $list['name'] }}</td>
        <td align='center'>{{ $list['tanggal'] }}</td>
        <td align='center'>{{ $list['jumlah'] }}</td>
        <td align='center'>
        <a href='{{ route("detail.laporan", ["id_pembelian" => $list["id_pembelian"]]) }}'>Lihat Detail</a> &nbsp;
        </td>
        </tr>
        <?php $no++; ?>
    @endforeach
            
            </table>
            <br>
            <center>            
            <input type="button" onclick="location.href='{{ route('admin.dashboard') }}';" value="Back" />
@endsection

@section('rightbar')
	
@endsection