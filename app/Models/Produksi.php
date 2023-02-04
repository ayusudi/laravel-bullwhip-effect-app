<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produksi extends Model
{
    use HasFactory;
    protected $table = 'produksi';
    protected $fillable = [
        'id_pesanan',
        'id_barang',
        'jumlah_produksi',
        'lead_time',
        'archive_status'
    ];
    public function pesanan(){
        return $this->belongsTo('App\Pesanan', 'id_pesanan');
    }
    public function barang(){
        return $this->belongsTo('App\Barang', 'id_barang');
    }
}
