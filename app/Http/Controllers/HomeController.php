<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\Routing\ResponseFactory;
use App\MasterBarang;
use App\User;
use App\ListPembelian;
use Validator;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function listBarang()
    {

        $barangs = MasterBarang::all();
          

        return view('list-barang', ['barangs'=> $barangs]);
    }

    public function pembelian()
    {
        $users = User::all();
        $barangs = MasterBarang::all();

        return view('pembelian', ['users' => $users, 'barangs' => $barangs]);
    }

    public function ajaxHarga(Request $request)
    {              
        $req = $request['id_barang'];
        
        $barangs = MasterBarang::where('id_barang', $req)->get();  

        foreach ($barangs as $barang) {
            $arr = array('harga' => $barang['harga'], );

        }
        
        //echo json_encode(['harga' => $arr]);
        //return json_encode(['harga' =>$arr]);
        
        return response()->json($arr);
                      
    }

    public function prosesPembelian(Request $request)
    {
        $today = date("Y-m-d H:i:s");
        $id_user = $request['nama'];
        $id_barang[] = $request['barang'];
        $qty[] = $request['quantity'];
        $lists = ListPembelian::orderBy('id_pembelian', 'desc')
                    ->take(1)
                    ->get();
        foreach ($lists as $list) {
            $code = $list['id_pembelian'];
        }

        preg_match("/(\D+)(\d+)/", $code, $matches);
        $product_kode = $matches[1];
        $new_id = intval($matches[2]);
        $new_id++;
        $kodelength = 4;
        $idlength = strlen($new_id);
        $missing = $kodelength - $idlength;
        
        for ($i=0; $i < $missing; $i++) { 
            $new_id = "0".$new_id;
        }

        $id_baru = $product_kode.$new_id;

        foreach ($id_barang as $value) {
            foreach ($qty as $k) {
                for ($i=0; $i < 100 ; $i++) { 
                    if (isset($value[$i])==TRUE){
                        $hargas = MasterBarang::where('id_barang', $value[$i])->get();
                            foreach ($hargas as $harga) {
                                $hrg = $harga['harga'];
                            }
                        $jml = ($hrg * $k[$i]);
                        $ins = new ListPembelian;
                        $ins->id_pembelian = $id_baru;
                        $ins->id_user = $id_user;
                        $ins->id_barang = $value[$i];
                        $ins->tanggal = $today;
                        $ins->qty = $k[$i];
                        $ins->jumlah = $jml;
                        $ins->save();

                        $stks = MasterBarang::where('id_barang', $value[$i])->get();
                            foreach ($stks as $stk) {
                                $stock = $stk['stock'];
                            }
                        $stock = $stock - $k[$i];
                        MasterBarang::where('id_barang', $value[$i])
                                        ->update(['stock' => $stock]);                    
                        
                    }
                }
            }
        }
        $msg = 'Pembelian Berhasil !';
        return redirect()->route('user.pembelian.post', ['success' => $msg]);
    }

    public function historyPembelian()
    {
        $id_user = Auth::user()->id;
        $all = ListPembelian::where('users.id', $id_user)
                    ->join('users', 'id_user', '=', 'users.id')
                    ->join('master_barang', 'list_pembelian.id_barang', '=', 'master_barang.id_barang')
                    ->select('id_pembelian', 'tanggal', 'users.name', 'master_barang.nama_barang', 'qty', 'jumlah')
                    ->get();

        return view('history-user', ['barangs'=> $all]);
        
    }

    public function printPdf1()
    {
        $name = Auth::user()->name;
        $id_user = Auth::user()->id;
        $all = ListPembelian::where('users.id', $id_user)
                    ->join('users', 'id_user', '=', 'users.id')
                    ->join('master_barang', 'list_pembelian.id_barang', '=', 'master_barang.id_barang')
                    ->select('id_pembelian', 'tanggal', 'users.name', 'master_barang.nama_barang', 'qty', 'jumlah')
                    ->get();
        return view('printpdf1', ['name'=> $name, 'barang' => $all]);
    }

}
