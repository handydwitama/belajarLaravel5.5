<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ListPembelian extends Model
{
    protected $table = 'list_pembelian';
    public $timestamps = false;

	protected $fillable = [
	    'id_pembelian', 'id_user', 'id_barang', 'tanggal', 'qty', 'jumlah',
	];
}
