<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_barang';
    protected $table = 'barang';
    protected $fillable = ['nama_barang', 'archive_status'];
    public static function bullwhipEffect(){
        try {
            $query = "SELECT
                barang.id_barang,
                barang.nama_barang,
                ROUND(STDDEV(jumlah_pesanan), 3) AS s_order,
                ROUND(
                    AVG(pemesanan.jumlah_pesanan),
                    3
                ) AS mean_order,
                ROUND(STDDEV(jumlah_produksi), 3) AS s_demand,
                ROUND(
                    AVG(produksi.jumlah_produksi),
                    3
                ) AS mean_demand,
                ROUND(
                    (
                        STDDEV(jumlah_pesanan) / AVG(jumlah_pesanan)
                    ),
                    3
                ) AS cv_order,
                ROUND(
                    (
                        STDDEV(jumlah_produksi) / AVG(jumlah_produksi)
                    ),
                    3
                ) AS cv_demand,
                ROUND(
                    (
                        (
                            STDDEV(jumlah_pesanan) / AVG(jumlah_pesanan)
                        ) / (
                            STDDEV(jumlah_produksi) / AVG(jumlah_produksi)
                        )
                    ),
                    3
                ) AS BE,
                produksi.lead_time,
                ROUND(
                    (
                        1 + ((2 * produksi.lead_time) / 30) + (
                            (2 * produksi.lead_time ^ 2) / (30 ^ 2)
                        )
                    ),
                    3
                ) AS parameter,
                ROUND(
                    (
                        (
                            STDDEV(jumlah_pesanan) / AVG(jumlah_pesanan)
                        ) / (
                            STDDEV(jumlah_produksi) / AVG(jumlah_produksi)
                        )
                    ) > 1 + ((2 * produksi.lead_time) / 30) + (
                        (2 * produksi.lead_time ^ 2) / (30 ^ 2)
                    ),
                    3
                ) AS Bullwhip_Effect
                FROM
                    barang
                INNER JOIN pemesanan ON pemesanan.id_barang = barang.id_barang
                INNER JOIN produksi ON produksi.id_barang = pemesanan.id_barang
                GROUP BY
                    barang.nama_barang, produksi.lead_time";
            $result = \DB::select($query);
            $resultArray = json_decode(json_encode($result), true);
            return $resultArray;
        } catch (Exception $e) {
            throw $e;
        }
    }
}
