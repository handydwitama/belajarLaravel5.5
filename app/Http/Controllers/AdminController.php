<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\Routing\ResponseFactory;
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
        return view('admin');
    }

    public function listUser()
    {
        $users = User::all();
          
        return view('list-user', ['users'=> $users]);
    }

    public function adminListBarang()
    {
        $barangs = MasterBarang::all();
          
        return view('admin-list-barang', ['barangs'=> $barangs]);
    }

    public function laporan()
    {
        $lists = ListPembelian::join('users', 'id_user', '=', 'users.id')
                ->select('id_pembelian', 'tanggal', 'users.name', 'jumlah')
                ->get();
          
        return view('laporan', ['lists'=> $lists]);
    }

    public function detailLaporan()
    {
        $lists = ListPembelian::all();
          
        return view('laporan', ['lists'=> $lists]);
    }
   
    public function editUser()
    {
        $lists = ListPembelian::join('users', 'id_user', '=', 'users.id')
                ->select('id_pembelian', 'tanggal', 'users.name', 'jumlah')
                ->sum('jumlah')
                ->get();
          
        return view('laporan', ['lists'=> $lists]);
    }

    public function removeUser()
    {
        $lists = ListPembelian::all();
          
        return view('laporan', ['lists'=> $lists]);
    }

    public function addBarang()
    {
        $lists = ListPembelian::all();
          
        return view('laporan', ['lists'=> $lists]);
    }

    public function editBarang()
    {
        $lists = ListPembelian::all();
          
        return view('laporan', ['lists'=> $lists]);
    }

    public function removeBarang()
    {
        $lists = ListPembelian::all();
          
        return view('laporan', ['lists'=> $lists]);
    }
}
