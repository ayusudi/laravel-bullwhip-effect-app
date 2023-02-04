<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePengambilanRequest;
use App\Http\Requests\UpdatePengambilanRequest;
use App\Models\Pengambilan;

class PengambilanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('table-list', [
            'title_page' => 'Pengambilan',
            'table_headers' => [ 'id_pegawai', 'Nama Pengambilan', 'Nama Barang', 'Jumlah Pengambilan'],
            'links_sidebar' => [
                ['Stock', '/gudang'],
                ['Pengambilan', '/gudang/pengambilan'],
              ]
        ]);
    }

    public function gudang()
    {
        return view('table-list', [
            'title_page' => 'Stock Gudang',
            'table_headers' => [ 'id_pegawai', 'Nama Pengambilan', 'Nama Barang', 'Jumlah Pengambilan'],
            'links_sidebar' => [
                ['Stock', '/gudang'],
                ['Pengambilan', '/gudang/pengambilan'],
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
     * @param  \App\Http\Requests\StorePengambilanRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePengambilanRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pengambilan  $pengambilan
     * @return \Illuminate\Http\Response
     */
    public function show(Pengambilan $pengambilan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pengambilan  $pengambilan
     * @return \Illuminate\Http\Response
     */
    public function edit(Pengambilan $pengambilan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePengambilanRequest  $request
     * @param  \App\Models\Pengambilan  $pengambilan
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePengambilanRequest $request, Pengambilan $pengambilan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pengambilan  $pengambilan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pengambilan $pengambilan)
    {
        //
    }
}
