<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePemesananRequest;
use App\Http\Requests\UpdatePemesananRequest;
use App\Models\Pemesanan;

class PemesananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('table-list', [
            'title_page' => 'Pemesanan',
            'table_headers' => [ 'id_pesanan', 'Nama Pemesan', 'Nama Barang', 'Jumlah Pesanan' ],
            'links_sidebar' => [
                ['Pemesanan', '/pemesanan'],
                ['Produksi', '/pemesanan/produksi'],
              ]
        ]);
    }

    public function readProduksi()
    {
        return view('table-list', [
            'title_page' => 'Pesanan Produksi',
            'table_headers' => [ 'id_produksi', 'Nama Barang', 'Produksi', 'Jumlah Produksi', 'Lead Time' ],
            'links_sidebar' => [
                ['Pemesanan', '/pemesanan'],
                ['Produksi', '/pemesanan/produksi'],
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
     * Display the specified resource.
     *
     * @param  \App\Models\Pemesanan  $pemesanan
     * @return \Illuminate\Http\Response
     */
    public function show(Pemesanan $pemesanan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pemesanan  $pemesanan
     * @return \Illuminate\Http\Response
     */
    public function edit(Pemesanan $pemesanan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePemesananRequest  $request
     * @param  \App\Models\Pemesanan  $pemesanan
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePemesananRequest $request, Pemesanan $pemesanan)
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
