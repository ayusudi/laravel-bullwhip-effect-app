<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produksi extends Model
{
    use HasFactory;
    protected $table = 'produksi';
    protected $primaryKey = 'id_produksi';
    protected $fillable = [
        'id_pesanan',
        'id_barang',
        'jumlah_produksi',
        'lead_time',
        'archive_status'
    ];
    public function pesanan(){
        return $this->belongsTo('App\Models\Pemesanan', 'id_pesanan', 'id_pesanan');
    }
    public function barang(){
        return $this->belongsTo('App\Models\Barang', 'id_barang', 'id_barang');
    }
}
