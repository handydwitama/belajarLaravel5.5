<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ListPembelian extends Model
{
    protected $table = 'list_pembelian';
    public $timestamps = false;

	protected $fillable = [
	    'pembelian_id', 'user_id', 'barang_id', 'tanggal', 'qty', 'jumlah',
	];

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function masterBarang()
    {
        return $this->belongsTo('App\MasterBarang', 'barang_id');
    }

}
