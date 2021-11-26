<?php

class Mahasiswa extends Controller {
 
    public function index() {
        $data["judul"] = "Daftar Mahasiswa";
        $data["mhs"] = $this->model('Mahasiswa_model')->getAllUser();
        $this->view('templates/header', $data);
        $this->view('mahasiswa/index', $data);
        $this->view('templates/footer');
    }

    public function detail($id){
        $data["judul"] = "Detail Mahasiswa";
        $data["mhs"] = $this->model('Mahasiswa_model')->getUserById($id);
        $this->view('templates/header', $data);
        $this->view('mahasiswa/detail', $data);
        $this->view('templates/footer');
    }

    public function tambah(){

        if($this->model('Mahasiswa_model')->tambahDataMahasiswa($_POST) > 0) {
            Flasher::setFlash('Berhasil', 'Ditambahkan', 'success');
            header("Location: ". BASEURL ."/mahasiswa");
            exit;
        } else {
            Flasher::setFlash('GAGAL', 'Ditambahkan', 'danger');
            header("Location: ". BASEURL ."/mahasiswa");
            exit;
        }
        
    }

    public function hapus($id){
       if($this->model('Mahasiswa_model')->deleteMahasiswa($id) > 0) {
            Flasher::setFlash('Berhasil', 'Dihapus', 'success');
            header("Location: ". BASEURL ."/mahasiswa");
            exit;
       } else {
        Flasher::setFlash('GAGAL', 'Dihapus', 'danger');
        header("Location: ". BASEURL ."/mahasiswa");
        exit;
       }
    }

    public function getUbah(){
        echo json_encode($this->model("Mahasiswa_model")->getUserById($_POST["id"]));
    }

    public function ubahDataMahasiswa(){

        if($this->model('Mahasiswa_model')->ubahDataMahasiswa($_POST) > 0) {
            Flasher::setFlash('Berhasil', 'Diubah', 'success');
            header("Location: ". BASEURL ."/mahasiswa");
            exit;
        } else {
            Flasher::setFlash('GAGAL', 'Diubah', 'danger');
            header("Location: ". BASEURL ."/mahasiswa");
            exit;
        }
        
    }

    public function cariMahasiswa(){
        $data["judul"] = "Daftar Mahasiswa";
        $data["mhs"] = $this->model('Mahasiswa_model')->cariDataMahasiswa($_POST);
        $this->view('templates/header', $data);
        $this->view('mahasiswa/index', $data);
        $this->view('templates/footer');
    }

    public function livesearch(){
        $keyword = $_POST["keyword"];
        $data["mhs"] = $this->model('Mahasiswa_model')->cariDataMahasiswa($keyword);

        $this->view('mahasiswa/ajax', $data);
    }

}