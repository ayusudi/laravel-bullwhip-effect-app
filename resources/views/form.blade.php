@include('layouts.head-navbar-sidebar', [
    'links_sidebar' => $links_sidebar
])
<div class="container-fluid">
    <div class="card shadow">
        <div class="card-header py-3">
            <p class="text-primary m-0 fw-bold">Form {{$title_page}}</p>
        </div>
        <div class="card-body">
            <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
            @if ($form_type === 'create_pegawai')
                @include('forms.pegawai-create')
            @elseif ($form_type === 'update_pegawai')
                @include('forms.pegawai-update', ['data' => $data])
            @elseif ($form_type === 'create_barang')
                @include('forms.barang-create')
            @elseif ($form_type === 'update_barang')
                @include('forms.barang-update', ['data' => $data])

            @endif
            </div>
        </div>
    </div>
</div>
@include('layouts.footer')
