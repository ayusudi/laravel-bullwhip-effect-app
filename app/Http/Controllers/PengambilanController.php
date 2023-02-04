<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePengambilanRequest;
use App\Http\Requests\UpdatePengambilanRequest;
use App\Models\Pengambilan;

class PengambilanController extends Controller
{
    public function index()
    {
        $data = Pengambilan::all();
        $data->load('barang');
        return view('table-list', [
            'data' => $data,
            'title_page' => 'Pengambilan',
            'table_headers' => [ 'id_pengambilan', 'Nama Pengambilan', 'Nama Barang', 'Jumlah Pengambilan'],
            'links_sidebar' => [
                ['Stock Gudang', '/gudang'],
                ['Pengambilan', '/gudang/pengambilan'],
              ]
        ]);
    }
    public function gudang()
    {
        $data = Pengambilan::stockBarang();
        return view('table-list', [
            'data' => $data,
            'title_page' => 'Stock Gudang',
            'table_headers' => ['id_barang', 'Nama Barang', 'Jumlah Produksi', 'Jumlah Pengambilan', 'Stock Barang'],
            'links_sidebar' => [
                ['Stock Gudang', '/gudang'],
                ['Pengambilan', '/gudang/pengambilan'],
              ]
        ]);
    }
}
