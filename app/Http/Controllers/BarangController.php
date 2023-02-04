<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBarangRequest;
use App\Http\Requests\UpdateBarangRequest;
use App\Models\Barang;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Barang::where('archive_status', false)->get();
        return view('table-list', [
            'data' => $data,
            'title_page' => 'Barang',
            'table_headers' => [ 'id_barang', 'Nama Barang' ],
            'add_link' => '/admin/barang/create',
            'links_sidebar' => [
                ['Pegawai', '/admin/pegawai'],
                ['Bagian', '/admin/bagian'],
                ['Barang', '/admin/barang'],
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
        return view('form', [
            'title_page' => 'Barang Baru',
            'form_type' => 'create_barang',
            'links_sidebar' => [
                ['Pegawai', '/admin/pegawai'],
                ['Bagian', '/admin/bagian'],
                ['Barang', '/admin/barang'],
              ]
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBarangRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBarangRequest $request)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Barang::find($id);
        return view('form', [
            'data' => $data,
            'title_page' => 'Edit Barang '.$id,
            'form_type' => 'update_barang',
            'links_sidebar' => [
                ['Pegawai', '/admin/pegawai'],
                ['Bagian', '/admin/bagian'],
                ['Barang', '/admin/barang'],
              ]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBarangRequest  $request
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBarangRequest $request, Barang $barang)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Barang::find($id);
        $data->archive_status = true;
        $data->save();
        return redirect("/admin/barang");
    }
}
