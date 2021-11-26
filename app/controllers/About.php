<?php

class About extends Controller {
    public function index($nama = "Alim Perdana", $universitas = "Universitas Sriwijaya", $semester = 1){
        $data["nama"] = $nama;
        $data["universitas"] = $universitas;
        $data["semester"] = $semester;
        $data["judul"] = "About Me";
        $this->view('templates/header', $data);
        $this->view('about/index', $data);
        $this->view('templates/footer');
    }
    public function page(){
        $data["judul"] = "Page";
        $this->view('templates/header', $data);
        $this->view('about/page');
        $this->view('templates/footer');
    }
}