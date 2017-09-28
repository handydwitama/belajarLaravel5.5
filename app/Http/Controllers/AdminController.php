<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Support\Facades\HTML;
use App\MasterBarang;
use App\User;
use App\ListPembelian;
use Validator;
use Auth;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin/admin');
    }

    public function listUser()
    {
        $users = User::all();
        $deleted = User::onlyTrashed()->get();

        return view('admin/list-user', ['users'=> $users, 'deleted' => $deleted]);
    }
   
    public function editUser()
    {
        $id = $_GET['id'];
        $user = User::where('id', '=', $id)
                ->get();
        return view('admin/edit-user', ['users' => $user]);
    }

    public function editUserPost(Request $request)
    {   
        $this->validate($request, [
            'name' => 'required',      
            'umur' => 'required',
            'alamat' => 'required',
        ]);

        if(!empty($request['password'])){
            $new_password = Hash::make($request['password']);
            User::where('email', $request['email'])
                ->update(['password' => $new_password]);
        }

        User::where('email', $request['email'])
            ->update(['name' => $request['name'], 'umur' => $request['umur'], 'alamat' => $request['alamat']]);

        $msg = 'Edit User Berhasil !';
        return redirect()->route('listuser', ['success' => $msg]);
    }

    public function removeUser(Request $request)
    {
        $id = $request['id'];
        $users = User::where('id', $id)->delete();
        
        $msg = 'Remove User Berhasil !';
        return redirect()->route('listuser', ['success' => $msg]);
    }

    public function restoreUser(Request $request)
    {
        $id = $request['id'];        
        $users = User::onlyTrashed()->where('id', $id)->restore();
        
        $msg = 'Restore User Berhasil !';
        return redirect()->route('listuser', ['success' => $msg]);
    }
    
    public function adminListBarang()
    {
        $barangs = MasterBarang::all();
        $deleted = MasterBarang::onlyTrashed()->get();

        return view('admin/admin-list-barang', ['barangs'=> $barangs, 'deleted' => $deleted]);
    }   

    public function addBarang()
    {        
        return view('admin/add-barang');
    }

    public function addBarangPost(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',      
            'stock' => 'required',
            'harga' => 'required',
        ]);        

        $add = new MasterBarang;
        $add->nama_barang = $request['name'];
        $add->stock = $request['stock'];
        $add->harga = $request['harga'];
        $add->save();

        $msg = 'Add Barang Berhasil !';
        return redirect()->route('admin.listbarang', ['success' => $msg]);
    }

    public function editBarang()
    {
        $id = $_GET['id'];
        $barangs = MasterBarang::where('id', '=', $id)
                ->get();
        return view('admin/edit-barang', ['barangs' => $barangs]);
    }

    public function editBarangPost(Request $request)
    {   
        $this->validate($request, [
            'name' => 'required',      
            'stock' => 'required',
            'harga' => 'required',
        ]);        

        MasterBarang::where('nama_barang', $request['name'])
            ->update(['stock' => $request['stock'], 'harga' => $request['harga']]);

        $msg = 'Edit Barang Berhasil !';
        return redirect()->route('admin.listbarang', ['success' => $msg]);
    }

    public function removeBarang(Request $request)
    {
        $id = $request['id'];
        $barangs = MasterBarang::where('id', $id)->delete();
        
        $msg = 'Remove Barang Berhasil !';
        return redirect()->route('admin.listbarang', ['success' => $msg]);
    }

    public function restoreBarang(Request $request)
    {
        $id = $request['id'];        
        $barangs = MasterBarang::onlyTrashed()->where('id', $id)->restore();
        
        $msg = 'Restore Barang Berhasil !';
        return redirect()->route('admin.listbarang', ['success' => $msg]);
    }

    public function laporan()
    {
        $lists = ListPembelian::with(['user', 'masterBarang'])                       
                ->get();
        $grup = $lists->groupBy('pembelian_id');

        /*foreach ($grup as $key) {
            $same = $key[0]['pembelian_id'];
            echo $key[0]->where('pembelian_id', $same)->sum('jumlah')."<br>";
            echo $key[0]['masterBarang']['nama_barang']."<br>";
        }*/           
        return view('admin/laporan', ['lists'=> $grup]);
    }

    public function detailLaporan()
    {
        $id = $_GET['id'];            
        $lists = ListPembelian::with(['user', 'masterBarang'])
                ->where('pembelian_id', '=', $id)
                ->get();
        foreach ($lists as $list) {
            $nama = $list['user']['name'];
            $tanggal = $list['tanggal'];
            $trans = $list['pembelian_id'];
        }
        return view('admin/detail-laporan', ['lists'=> $lists, 'nama' => $nama, 'tanggal' => $tanggal, 'trans' => $trans]);
    }
}
