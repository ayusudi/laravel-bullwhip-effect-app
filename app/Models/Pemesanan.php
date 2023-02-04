<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    use HasFactory;
    protected $table = 'pemesanan';
    protected $fillable = [
        'nama_pemesan',
        'id_barang',
        'jumlah_pesanan',
        'proses',
        'archive_status'
    ];
    public function barang(){
        return $this->belongsTo('App\Barang', 'id_barang');
    }
}
