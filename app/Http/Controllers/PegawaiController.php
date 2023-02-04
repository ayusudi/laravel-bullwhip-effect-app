<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePegawaiRequest;
use App\Http\Requests\UpdatePegawaiRequest;
use Illuminate\Http\Request;
use App\Models\Pegawai;

class PegawaiController extends Controller
{
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

    public function store(Request $request)
    {
        Pegawai::create([
            'username' => $request['username'],
            'password' => $request['password'],
            'nama_pegawai' => $request['nama_pegawai'],
            'id_bagian' => $request['id_bagian'],
            'hp_pegawai' => $request['hp_pegawai'],
            'alamat_pegawai' => $request['alamat_pegawai']
        ]);
        return redirect("/admin/pegawai");
    }

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
    public function update(Request $request, $id)
    {
        $data = Pegawai::find($id);
        $data['username'] = $request['username'];
        $data['password'] = $request['password'];
        $data['nama_pegawai'] = $request['nama_pegawai'];
        $data['hp_pegawai'] = $request['hp_pegawai'] ;
        $data['id_bagian'] = $request['id_bagian'];
        $data['alamat_pegawai'] = $request['alamat_pegawai'];
        $data->save();
        return redirect("/admin/pegawai");
    }
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
