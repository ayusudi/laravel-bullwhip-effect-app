<?php

namespace App\Http\Controllers;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\Pegawai;
use Session;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function landingPage(){
        return view('welcome');
    }
    public function index(){
        return view('login');
    }
    public function doLoginDevelopment(Request $loginRequest){
        $data = Pegawai::where('username', $loginRequest['username'])->first();
        if (!$data){
            return redirect('/login')->withErrors(['message' => 'Failed login!']);
        } else if ($data && $data['password'] !== $loginRequest['password']){
            return redirect('/login')->withErrors(['message' => 'Failed login!']);
        } else {
            $data->load('bagian');
            Session::put('username', $data['username']);
            Session::put('id_bagian', $data['id_bagian']);
            Session::put('nama_bagian', $data['bagian']['nama_bagian']);
            if ($data['id_bagian'] === 7) {
                return redirect('/admin/pegawai');
            } else if ($data['id_bagian'] === 8) {
                return redirect('/bullwhip/graphic');
            } else if ($data['id_bagian'] === 9) {
                return redirect('/gudang');
            } else if ($data['id_bagian'] === 10) {
                return redirect('/pemesanan');
            } else if ($data['id_bagian'] === 11) {
                return redirect('/produksi');
            } else {
                return redirect('/');
            }
        }
    } 
    public function logout(){
        Session::flush();
        return redirect("/login");
    }
    public function bullwhip(){
       $data = Barang::bullwhipEffect();
       return  view('table-list',[
        'data' => $data,
        'title_page' => 'BullWhip Effect Table Barang',
        'table_headers' => [ 'id_barang', 'Nama Barang', 's_order', 'Mean Order', 's_demand', 'Mean Demand', 'CV Order', 'CV Demand', 'BE', 'Lead Time', 'Parameter', 'Bullwhip Effect' ],        
        'links_sidebar' => [
            ['Dashboard Graphic', '/bullwhip/graphic'],
            ['Bullwhip Effect', '/bullwhip']
        ]]);
    }
    public function bullwhipGraphic(){
      $data = Barang::bullwhipEffect();
       return  view('graphic',[
        'DaftarBE' => $data,
        'title_page' => 'BullWhip Effect Table Barang Graphic',
        'links_sidebar' => [
            ['Dashboard Graphic', '/bullwhip/graphic'],
            ['Bullwhip Effect', '/bullwhip']
        ]]);
    }
}
