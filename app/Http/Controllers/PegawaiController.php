<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePegawaiRequest;
use App\Http\Requests\UpdatePegawaiRequest;
use App\Models\Pegawai;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($error = '')
    {
        $data = Pegawai::where('archive_status', false)->get();
        $data->load('bagian');
        return view('table-list', [
            'data' => $data,
            'title_page' => 'Pegawai',
            'table_headers' => [ 'id_pegawai', 'Username', 'Password', 'Nama Pegawai', 'Nama Bagian', 'Hp' , 'Alamat', 'Action'],
            'add_link' => '/admin/pegawai/create',
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
            'title_page' => 'Pegawai Baru',
            'form_type' => 'create_pegawai',
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
     * @param  \App\Http\Requests\StorePegawaiRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePegawaiRequest $request)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Pegawai::find($id);
        return view('form', [
            'data' => $data,
            'title_page' => 'Edit Pegawai '.$id,
            'form_type' => 'update_pegawai',
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
     * @param  \App\Http\Requests\UpdatePegawaiRequest  $request
     * @param  \App\Models\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePegawaiRequest $request, Pegawai $pegawai)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pegawai = Pegawai::find($id);
        if ($pegawai->id_bagian !== 7){
            $pegawai->archive_status = true;
            $pegawai->save();
            $error = '';
        } else {
            return redirect("/admin/pegawai")->withErrors('Not allowed to delete admin');
        }
        return redirect("/admin/pegawai");
    }
}
