<form class="py-3 row">
    @csrf
    <div class="mb-4 col-12">
        <input class="form-control form-control-user" type="text" id="nama_pegawai" placeholder="Nama Pegawai" name="nama_pegawai">
    </div>
    <div class="mb-4 col-6">
        <input class="form-control form-control-user" type="text" id="exampleInputUsername"  placeholder="Username" name="username">
    </div>
    <div class="mb-4 col-6">
        <input class="form-control form-control-user" type="password" id="exampleInputPassword" placeholder="Password" name="password">
    </div>
    <div class="mb-4 col-6">
        <select name="id_bagian" class="form-select form-select-md" >
            <option value="" selected>Pilih Bagian Pegawai</option>
            <option value="7">administrator</option>
            <option value="8">manajer</option>
            <option value="9">gudang</option>
            <option value="10">pesanan</option>
            <option value="11">produksi</option>
        </select>
    </div>
    <div class="mb-4 col-6">
        <input class="form-control form-control-user" type="text" id="hp_pegawai" placeholder="Handphone" name="hp_pegawai">
    </div>
    <div class="mb-4 w-100">
        <textarea rows="4" class="form-control form-control-user" type="text" id="alamat_pegawai" placeholder="Alamat" name="alamat_pegawai"></textarea>
    </div>
    <div class="mb-4 col">
        <input class="btn btn-primary bg-primary px-3"  type="submit" value="Submit">
    </div>
</form>