<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBarangRequest;
use App\Http\Requests\UpdateBarangRequest;
use Illuminate\Http\Request;
use App\Models\Barang;

class BarangController extends Controller
{
    public function index()
    {
        $data = Barang::where('archive_status', false)->get();
        return view('table-list', [
            'data' => $data,
            'title_page' => 'Barang',
            'table_headers' => [ 'id_barang', 'Nama Barang', 'Action' ],
            'add_link' => '/admin/barang/create',
            'links_sidebar' => [
                ['Pegawai', '/admin/pegawai'],
                ['Bagian', '/admin/bagian'],
                ['Barang', '/admin/barang'],
              ]
        ]);
    }
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
    public function store(Request $request)
    {
        Barang::create(['nama_barang' => $request['nama_barang']]);
        return redirect('/admin/barang');
    }
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
    public function update(Request $request, $id)
    {
        $data = Barang::find($id);
        $data['nama_barang'] = $request['nama_barang'];
        $data->save();
        return redirect("/admin/barang");
    }
    public function destroy($id)
    {
        $data = Barang::find($id);
        $data->archive_status = true;
        $data->save();
        return redirect("/admin/barang");
    }
}
