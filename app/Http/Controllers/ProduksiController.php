<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProduksiRequest;
use App\Http\Requests\UpdateProduksiRequest;
use App\Models\Produksi;
use App\Models\Pemesanan;

class ProduksiController extends Controller
{
    public function index()
    {
        $data = Produksi::all();
        $data->load('barang');
        return view('table-list', [
            'data' => $data,
            'title_page' => 'Produksi',
            'table_headers' => [ 'id_produksi', 'Nama Barang',  'Jumlah Produksi', 'Lead Time', '' ],
            'links_sidebar' => [
                ['Produksi', '/produksi'],
            ]
        ]);
       
    }
    public function update($id)
    {
        $produksi = Produksi::find($id);
        $data = Pemesanan::find($produksi['id_pesanan']);
        $data->proses = 1;
        $data->save();
        return redirect("/produksi");
    }
}
