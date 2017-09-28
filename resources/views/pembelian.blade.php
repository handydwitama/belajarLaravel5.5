@extends('layouts.app')

@section('header')
	@include('temp.header')
@endsection

@section('leftbar')
	
@endsection

@section('content')

	<form id="myForm" method="POST" action="{{ route('proses.pembelian') }}">
	{{ csrf_field() }}
            <input type = 'hidden' name='nama' id ='nama' value="{{ Auth::user()->id }}" readonly/></input>
            <p><h2>{{ Auth::user()->name }}</h2></p>
            <br>
            <br>

            <table  id="theTable" border='2' Width='600'>  
                <tr>    
                    <th class = "text-center"> Nomor </th>
                    <th class = "text-center"> Nama Barang </th>
                    <th class = "text-center"> Harga Satuan</th>
                    <th class = "text-center"> Quantity </th>
                    <th class = "text-center"> Jumlah Harga</th>

                </tr>

                <tr id="templateRow" class="templateRow" align="center">
                    <td class="nom">1</td>
                    <td><select class='barang' name='barang[]' id='barang[]' onchange="ajax_harga(this);">
                        @foreach($barangs as $barang)
                                <option value='{{ $barang["id"] }}'>{{ $barang['nama_barang'] }}</option>
                        @endforeach                          
                    </select></td>
                    <td>
                        <p id="h" class="h" align="center">80000</p>
                    </td>
                    <td align="center">
                        <select id="quantity" name="quantity[]" class="q" onchange="get_jumlah(this);">
                            @for ($i=1; $i<11 ; $i++)  
                                <option value='{{ $i }}'>{{ $i }}</option>
                            @endfor
                        
                        </select>
                    </td>
                    <td><p id ="j[]" class="j" align="center">80000</p></td>
                </tr>
                <tr>
                    <td colspan="4" align="center"> Total Pembelian : </td>
                    <td>
                    <p align="center" id="sum" class="sum" value=""></p>
                    </td>
                </tr>
            </table>

            <script type="text/javascript">

                function total_harga(){
                    var tot = 0;
                    table = document.getElementById("theTable");
                    tr = table.getElementsByTagName("tr");
                    for (i = 1; i < tr.length-1; i++){
                        td = tr[i].getElementsByTagName("td")[4];
                        p = td.getElementsByTagName("p")[0];                    
                        if (td){                    
                            tot = tot + parseInt(p.innerHTML);
                        }       
                    }
                    document.getElementById("sum").innerHTML = tot;
                }

                var get_jumlah = function(event){
                    var qty = $(event);
                    var hrg = qty.parent().parent().find(".h");
                    var jml = qty.parent().parent().find(".j");
                    var hrg1 = hrg.html();
                    var qty1 = qty.val();
                    jml.html(hrg1 * qty1);
                    total_harga();
                }

                function mySubmit() {
                    document.getElementById("myForm").submit();
                }
                
                var ajax_harga = function(event){
	                var barang = $(event);
	                var harga = barang.parent().parent().find(".h");
                    var _token = $("input[name='_token']").val();

	                $.ajax({	                		
	                        url: "/pembelian",
	                        type: 'post', // performing a POST request
	                        	                         
	                        data : {
                                _token:_token,
	                            id_barang : barang.val()
	                        },
	                        dataType: "json",
	                        success: function(data) {
	                        harga.html(data.harga);
	                        var jml = barang.parent().parent().find(".j");
	                        jml.html(harga.html());
	                        var qt = barang.parent().parent().find(".q");
	                        qt.val(1);
	                        total_harga();
	                        }
	                    })
                

                }

                
                var a = 0;
                
                function getTemplateRow(){

                    var x = document.getElementsByClassName("templateRow")[a].cloneNode(true);
                    a++;;
                    return x;
                    

                }

                function addRow(){
                    var t = document.getElementById("theTable");
                    var rows = t.getElementsByTagName("tr");
                    var r = rows[rows.length-1];
                    r.parentNode.insertBefore(getTemplateRow(), r);
                    document.getElementsByClassName("nom")[a].innerHTML = a+1;
                    document.getElementsByClassName("h")[a].innerHTML = 80000;
                    document.getElementsByClassName("j")[a].innerHTML = 80000;
                    total_harga();
                
                }

                function deleteRow(row){
                    var i=row.parentNode.parentNode.rowIndex;
                    document.getElementById('theTable').deleteRow(a+1);
                    a--;
                    total_harga();
                }

            
            
            </script>
        </form>

        <button id="add" onclick="addRow();">+</button>
        <button id="delete" onclick="deleteRow(this);">-</button>

        <br>
        <br>

        <input type="button" onclick="mySubmit()" value="Confirmasi Pembelian">  
        <br>
        <br>



        <input type="button" onclick="location.href='{{ route('home') }}';" value="Back" />
        
@endsection

@section('rightbar')
	
@endsection