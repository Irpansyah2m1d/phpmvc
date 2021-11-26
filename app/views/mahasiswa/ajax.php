<?php 

if(empty($data["mhs"])) {
    $error = true;
}

?>

<?php if(empty($data["mhs"])) : ?>
    <div class="row">
        <div class="col-lg-6 text-center">
            <h6 class="fw-bold text-danger">Data Tidak Di Temukan</h6>
        </div>
    </div>
    
<?php endif; ?>
<div class="row">
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