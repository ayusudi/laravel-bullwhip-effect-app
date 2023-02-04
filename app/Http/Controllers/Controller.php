<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Barang;


class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function landingPage(){
        return view('welcome');
    }
    public function index(){
        return view('login');
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
