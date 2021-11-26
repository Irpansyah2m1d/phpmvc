<div class="container mt-3">
    <div class="row">
      <div class="col-lg-6">
        <?php Flasher::Flash(); ?>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-6 mb-3">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary modalTambah" data-bs-toggle="modal" data-bs-target="#formModal">
        Tambah Data
        </button>
      </div>
    </div>
    
    <div class="row">
      <div class="col-lg-6">
        <form action="<?= BASEURL; ?>/mahasiswa/cariMahasiswa" method="post">
          <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Cari Mahasiswa..." autocomplete="off" name="keyword" id="keyword">
            <button class="btn btn-primary" type="submit" id="tombolCari">Cari</button>
          </div>
        </form>
      </div>
    </div>
    <h1>Data Mahasiswa POLSRI 2021</h1>
    
   <div class="row" id="table">
       <div class="col-lg-6">
            <ul class="list-group">
                <?php foreach($data["mhs"] as $mhs) : ?>
                    <li class="list-group-item">
                        <?= $mhs["nama"]; ?>
                        <a href="<?= BASEURL; ?>/mahasiswa/detail/<?= $mhs["id"]; ?>" class="badge bg-primary float-end ms-1">Detail</a>
                        <a href="<?= BASEURL; ?>/mahasiswa/ubah/<?= $mhs["id"]; ?>" class="badge bg-success float-end ms-1 modalUbah" data-bs-toggle="modal" data-bs-target="#formModal" data-id="<?= $mhs["id"]; ?>">Ubah</a>
                        <a href="<?= BASEURL; ?>/mahasiswa/hapus/<?= $mhs["id"]; ?>" class="badge bg-danger float-end ms-1" onclick="return confirm('Apakah Yakin Ingin Menghapus?');">Hapus</a>
                    </li>
                <?php endforeach; ?>
            </ul>
       </div>
   </div>
    
    
</div>
<!-- Modal -->
<div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="formModalLabel">Tambah Data Mahasiswa</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
    
        <div class="modal-body">
        <form action="<?= BASEURL; ?>/mahasiswa/tambah" method="POST">
            <input type="hidden" id="id" name="id">
            <div class="mb-3">
              <label for="nama" class="form-label">Nama Mahasiswa</label>
              <input type="text" class="form-control" id="nama" placeholder="Masukan Nama Anda" name="nama">
            </div>
            <div class="mb-3">
              <label for="npm" class="form-label">NPM Mahasiswa</label>
              <input type="npm" class="form-control" id="npm" placeholder="Masukan NPM Anda" name="npm">
            </div>
            <div class="mb-3">
              <label for="" class="form-label">Jurusan Mahasiwa</label>
              <select class="form-select" aria-label="Default select example" id="jurusan" name="jurusan">
                <option value="Teknik Komputer">Teknik Komputer</option>
                <option value="Teknik Kimia">Teknik Kimia</option>
                <option value="Teknik Mesin">Teknik Mesin</option>
                <option value="Teknik Sipil">Teknik Sipil</option>
                <option value="Manajemen Informatika">Manajemen Informatika</option>
              </select>
            </div>
            <div class="mb-3">
              <label for="alamat" class="form-label">Alamat Mahasiswa</label>
              <input type="text" class="form-control" id="alamat" placeholder="Masukan Alamat Anda" name="alamat">
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Tambah Data</button>
        </div>
      </form>
    </div>
  </div>
</div>