<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MasterBarang extends Model
{

    protected $table = 'master_barang';
    public $timestamps = false;

	protected $fillable = [
	    'id_barang', 'nama_barang', 'stock', 'harga',
	];

    
}
