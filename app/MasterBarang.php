<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MasterBarang extends Model
{
    use SoftDeletes;
    
    protected $table = 'master_barang';
   
    public $timestamps = false;

	protected $fillable = [
	    'id_barang', 'nama_barang', 'stock', 'harga',
	];
    
    protected $dates = ['deleted_at'];
    
    public function listPembelian()
    {
        return $this->hasOne('App\ListPembelian', 'barang_id');
    }
}
