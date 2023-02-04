<form class="py-3 row" method="POST" action="{{'/admin/barang/update/'.$data['id_barang']}}">
    @csrf
    <div class="mb-4 col-12">
        <input required value="{{$data['nama_barang']}}"  class="form-control form-control-user" type="text" id="hp_pegawai"  class="form-control form-control-user" type="text" id="nama_barang" placeholder="Nama Barang" name="nama_barang">
    </div>
    <div class="mb-4 col">
        <input class="btn btn-primary bg-primary px-3"  type="submit" value="Submit">
    </div>
</form>
