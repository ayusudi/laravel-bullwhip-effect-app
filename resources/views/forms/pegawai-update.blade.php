<form class="py-3 row" method="POST" action="{{'/admin/pegawai/update/'.$data['id_pegawai']}}">
    @csrf
    <div class="mb-4 col-12">
        <input required value="{{$data['nama_pegawai']}}" class="form-control form-control-user" type="text" id="nama_pegawai" placeholder="Nama Pegawai" name="nama_pegawai">
    </div>
    <div class="mb-4 col-6">
        <input required value="{{$data['username']}}" class="form-control form-control-user" type="text" id="exampleInputUsername"  placeholder="Username" name="username">
    </div>
    <div class="mb-4 col-6">
        <input required value="{{$data['password']}}" class="form-control form-control-user" type="password" id="exampleInputPassword" placeholder="Password" name="password">
    </div>
    <div class="mb-4 col-6">
        <select required name="id_bagian" class="form-select form-select-md" >
            <option value="7" @if($data['id_bagian'] === 7) selected="selected" @endif >administrator</option>
            <option value="8" @if($data['id_bagian'] === 8) selected="selected" @endif>manajer</option>
            <option value="9" @if($data['id_bagian'] === 9) selected="selected" @endif>gudang</option>
            <option value="10" @if($data['id_bagian'] === 10) selected="selected" @endif>pesanan</option>
            <option value="11" @if($data['id_bagian'] === 11) selected="selected" @endif>produksi</option>
        </select>
    </div>
    <div class="mb-4 col-6">
        <input required value="{{$data['hp_pegawai']}}"  class="form-control form-control-user" type="text" id="hp_pegawai" placeholder="Handphone" name="hp_pegawai">
    </div>
    <div class="mb-4 w-100">
        <textarea required  value="{{$data['alamat_pegawai']}}"  rows="4" class="form-control form-control-user" type="text" id="alamat_pegawai" placeholder="Alamat" name="alamat_pegawai"></textarea>
    </div>
    <div class="mb-4 col">
        <input class="btn btn-primary bg-primary px-3"  type="submit" value="Submit">
    </div>
</form>