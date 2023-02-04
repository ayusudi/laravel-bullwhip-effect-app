@include('layouts.head-navbar-sidebar', [
    'links_sidebar' => $links_sidebar
])
  <div class="container-fluid">
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
                            @elseif ($title_page === 'Stock Gudang') 
                            @elseif ($title_page === 'Pemesanan') 
                            @elseif ($title_page === 'Pesanan Produksi') 
                            @elseif ($title_page === 'Produksi') 
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
                              <td>{{$el['Bullwhip_Effect'] ? $el['Bullwhip_Effect'] : '*'}}</td>
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
