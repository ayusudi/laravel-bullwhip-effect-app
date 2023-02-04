<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengambilan extends Model
{
    use HasFactory;
    protected $table = 'pengembalian';
    protected $fillable = [
        'nama_pengambil',
        'id_barang',
        'jumlah_pengambilan',
        'archive_status'
    ];
    public function barang(){
        return $this->belongsTo('App\Barang', 'id_barang');
    }
}
