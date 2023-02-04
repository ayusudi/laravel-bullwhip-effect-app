<form class="py-3 row" method="POST" action="/admin/bagian/create">
    @csrf
    <div class="mb-4 col-12">
        <input required class="form-control form-control-user" type="text" id="nama_bagian" placeholder="Nama Bagian" name="nama_bagian">
    </div>
    <div class="mb-4 col">
        <input class="btn btn-primary bg-primary px-3"  type="submit" value="Submit">
    </div>
</form>