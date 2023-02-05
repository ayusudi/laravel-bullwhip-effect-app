@include('layouts.head-navbar-sidebar', [
    'links_sidebar' => $links_sidebar
])
  <div class="container-fluid">
    @if(count($errors) > 0)
        @foreach ($errors->all() as $error)
        <div class="alert alert-primary" role="alert">
            {{ $error }}
        </div>
        @endforeach
    @endif
      <div class="card shadow">
          <div class="card-header py-3 d-flex justify-content-between">
              <p class="text-primary m-0 fw-bold">{{$title_page}}</p>
              @isset($add_link) 
                <a href="{{ url(''.$add_link) }}" class="btn btn-primary btn-sm ">+ Create</a>
              @endisset
          </div>
          <div class="card-body">
              <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                  <table class="table my-0" id="dataTable">
                      <thead>
                          <tr>
                            @foreach ($table_headers as $th)
                              <th>{{$th}}</th>
                            @endforeach
                          </tr>
                      </thead>
                      <tbody>
                        @foreach ($data as $el) 
                            @if ($title_page === 'Pegawai') 
                            <tr>
                              <td>{{$el['id_pegawai']}}</td>
                              <td>{{$el['username']}}</td>
                              <td>{{$el['password']}}</td>
                              <td>{{$el['nama_pegawai']}}</td>
                              <td>{{$el['bagian']['nama_bagian']}}</td>
                              <td>{{$el['hp_pegawai']}}</td>
                              <td>{{$el['alamat_pegawai']}}</td>
                              <td>
                                <a class="btn btn-primary" href="{{url('/admin/pegawai/update/'.$el['id_pegawai'])}}">Update</a>
                                <a class="btn btn-secondary" href="{{url('/admin/pegawai/delete/'.$el['id_pegawai'])}}">Delete</a>
                              </td>
                            </tr>
                            @elseif ($title_page === 'Bagian') 
                            <tr>
                              <td>{{$el['id_bagian']}}</td>
                              <td>{{$el['nama_bagian']}}</td>
                              <td>
                                <a class="btn btn-primary" href="{{url('/admin/bagian/update/'.$el['id_bagian'])}}">Update</a>
                                <a class="btn btn-secondary" href="{{url('/admin/bagian/delete/'.$el['id_bagian'])}}">Delete</a>
                              </td>
                            </tr>
                            @elseif ($title_page === 'Barang') 
                            <tr>
                              <td>{{$el['id_barang']}}</td>
                              <td>{{$el['nama_barang']}}</td>
                              <td>
                                <a class="btn btn-primary" href="{{url('/admin/barang/update/'.$el['id_barang'])}}">Update</a>
                                <a class="btn btn-secondary" href="{{url('/admin/barang/delete/'.$el['id_barang'])}}">Delete</a>
                              </td>
                            </tr>
                            @elseif ($title_page === 'Pengambilan') 
                            <tr>
                              <td>{{$el['id_pengambilan']}}</td>
                              <td>{{$el['nama_pengambil']}}</td>
                              <td>{{$el['barang']['nama_barang']}}</td>
                              <td>{{$el['jumlah_pengambilan']}}</td>
                            </tr>
                            @elseif ($title_page === 'Stock Gudang') 
                            <tr>
                              <td>{{$el['id_barang']}}</td>
                              <td>{{$el['nama_barang']}}</td>
                              <td>{{$el['total_produksi']}}</td>
                              <td>{{$el['total_pengambilan']}}</td>
                              <td>{{$el['stok_barang']}}</td>
                            </tr>
                            @elseif ($title_page === 'Pemesanan') 
                            <tr>
                              <td>{{$el['id_pesanan']}}</td>
                              <td>{{$el['nama_pemesan']}}</td>
                              <td>{{$el['barang']['nama_barang']}}</td>
                              <td>{{$el['jumlah_pesanan']}}</td>
                            </tr>
                            @elseif ($title_page === 'Pesanan Produksi') 
                            <tr>
                              <td>{{$el['id_produksi']}}</td>
                              <td>{{$el['barang']['nama_barang']}}</td>
                              <td>{{$el['pesanan']['nama_pemesan']}}</td>
                              <td>{{$el['jumlah_produksi']}}</td>
                              <td>{{$el['pesanan']['proses']}}</td>
                              <td>{{$el['lead_time']}}</td>
                            </tr>
                            @elseif ($title_page === 'Produksi') 
                            <tr>
                              <td>{{$el['id_produksi']}}</td>
                              <td>{{$el['barang']['nama_barang']}}</td>
                              <td>{{$el['jumlah_produksi']}}</td>
                              <td>{{$el['lead_time']}}</td>
                              <td>
                                @if($el['pesanan']['proses']) On Progress 🚀 
                                @else Pending <a class="btn btn-primary btn-sm" href="{{url('/produksi/update/'.$el['id_produksi'])}}">Change</a>
                                @endif
                              </td>
                            </tr>
                            @elseif ($title_page === 'BullWhip Effect Table Barang')
                            <tr>
                              <td>{{$el['id_barang']}}</td>
                              <td>{{$el['nama_barang']}}</td>
                              <td>{{$el['s_order']}}</td>
                              <td>{{$el['mean_order']}}</td>
                              <td>{{$el['s_demand']}}</td>
                              <td>{{$el['mean_demand']}}</td>
                              <td>{{$el['cv_order']}}</td>
                              <td>{{$el['cv_demand']}}</td>
                              <td>{{$el['BE'] ?  $el['BE'] : '*'}}</td>
                              <td>{{$el['lead_time']}}</td>
                              <td>{{$el['parameter']}}</td>
                              <td>
                                  @if ($el['Bullwhip_Effect'])  <button class="btn btn-primary btn-sm">👍 Solusi | BullWhip</button>
                                  @else Tidak terjadi Bullwhip Effect
                                  @endif
                              </td>
                            </tr>
                            @endif
                        @endforeach
                      </tbody>
                  </table>
              </div>
          </div>
      </div>
  </div>
@include('layouts.footer')
