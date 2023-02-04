<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBagianRequest;
use Illuminate\Http\Request;
use App\Models\Bagian;

class BagianController extends Controller
{
    public function index()
    {
        $data = Bagian::all();
        return view('table-list', [
            'data' => $data,
            'title_page' => 'Bagian',
            'table_headers' => [ 'id_bagian', 'Nama Bagian', 'Action' ],
            'add_link' => '/admin/bagian/create',
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
            'title_page' => 'Bagian Baru',
            'form_type' => 'create_bagian',
            'links_sidebar' => [
                ['Pegawai', '/admin/pegawai'],
                ['Bagian', '/admin/bagian'],
                ['Barang', '/admin/barang'],
              ]
        ]);
    }
    public function store(Request $request)
    {
        Bagian::create(['nama_bagian' => $request['nama_bagian']]);
        return redirect('/admin/bagian');
    }
    public function edit($id)
    {
        $data = Bagian::find($id);
        return view('form', [
            'data' => $data,
            'title_page' => 'Edit Bagian '.$id,
            'form_type' => 'update_bagian',
            'links_sidebar' => [
                ['Pegawai', '/admin/pegawai'],
                ['Bagian', '/admin/bagian'],
                ['Barang', '/admin/barang'],
              ]
        ]);
    }
    public function update(Request $request, $id)
    {
        $data = Bagian::find($id);
        $data['nama_bagian'] = $request['nama_bagian'];
        $data->save();
        return redirect("/admin/bagian");
    }
    public function destroy($id)
    {
        if ($id > 11){
            $data = Bagian::destroy($id);
            return redirect("/admin/bagian");
        } else {
            return redirect("/admin/bagian")->withErrors(['message' => 'Not allowed to delete main bagian!']);;
        }
    }
}
