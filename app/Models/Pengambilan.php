<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengambilan extends Model
{
    use HasFactory;
    protected $table = 'pengambilan';
    protected $primaryKey = 'id_pengambilan';
    protected $fillable = [
        'nama_pengambil',
        'id_barang',
        'jumlah_pengambilan',
        'archive_status'
    ];
    public function barang(){
        return $this->belongsTo('App\Models\Barang', 'id_barang', 'id_barang');
    }
    public static function stockBarang(){
        try {
            $query = "SELECT
                barang.id_barang, barang.nama_barang,
                SUM(DISTINCT produksi.jumlah_produksi) as total_produksi,
                SUM(DISTINCT pengambilan.jumlah_pengambilan) as total_pengambilan,
                (
                    SUM(DISTINCT produksi.jumlah_produksi) -
                    SUM(DISTINCT 	pengambilan.jumlah_pengambilan)
                ) as stok_barang
            FROM
                barang
            JOIN produksi USING (id_barang)
            JOIN pengambilan USING (id_barang)
            GROUP BY nama_barang";
            $result = \DB::select($query);
            $resultArray = json_decode(json_encode($result), true);
            return $resultArray;
        } catch (Exception $e) {
            throw $e;
        }
        
    }
}
