<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePemesananRequest;
use App\Http\Requests\UpdatePemesananRequest;
use App\Models\Pemesanan;
use App\Models\Produksi;

class PemesananController extends Controller
{
    public function index()
    {
        $data = Pemesanan::all();
        $data->load('barang');
        return view('table-list', [
            'data' => $data,
            'title_page' => 'Pemesanan',
            'table_headers' => [ 'id_pesanan', 'Nama Pemesan', 'Nama Barang', 'Jumlah Pesanan' ],
            'links_sidebar' => [
                ['Pemesanan', '/pemesanan'],
                ['Pesanan Produksi', '/pemesanan/produksi'],
              ]
        ]);
    }
    public function readProduksi()
    {
        $data = Produksi::all();
        $data->load('barang');
        $data->load('pesanan');
        return view('table-list', [
            'data' => $data,
            'title_page' => 'Pesanan Produksi',
            'table_headers' => [ 'id_produksi', 'Nama Barang', 'Nama Pemesan','Jumlah Produksi', 'Proses', 'Lead Time' ],
            'links_sidebar' => [
                ['Pemesanan', '/pemesanan'],
                ['Pesanan Produksi', '/pemesanan/produksi'],
              ]
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePemesananRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePemesananRequest $request)
    {
        //
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pemesanan  $pemesanan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pemesanan $pemesanan)
    {
        //
    }
}
