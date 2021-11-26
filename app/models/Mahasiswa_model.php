<?php

class Mahasiswa_model {
    private $tbl = 'mahasiswa';
    private $db;
    public function __construct(){
       $this->db = new Database;
    }
    public function getAllUser(){
        $this->db->query("SELECT * FROM ". $this->tbl ." order by id desc");
        return $this->db->resultSet();
    }

    public function getUserById($id){
        $this->db->query("SELECT * FROM ". $this->tbl ." WHERE id=:id");
        $this->db->bind('id', $id );
        return $this->db->single();
    }

    public function tambahDataMahasiswa($data){
        $query = "INSERT INTO mahasiswa VALUES
                ('', :nama, :npm, :jurusan, :alamat)";
        $this->db->query($query);
        

        $this->db->bind('nama', $data["nama"]);
        $this->db->bind('npm', $data["npm"]);
        $this->db->bind('jurusan', $data["jurusan"]);
        $this->db->bind('alamat', $data["alamat"]);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function deleteMahasiswa($id) {
        $this->db->query("DELETE FROM ". $this->tbl ." WHERE id=:id");
        $this->db->bind('id', $id);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function ubahDataMahasiswa($data){
        $query = "UPDATE " . $this->tbl . " SET nama = :nama, npm = :npm, jurusan = :jurusan, alamat = :alamat WHERE id = :id";
        $this->db->query($query);
        

        $this->db->bind('nama', $data["nama"]);
        $this->db->bind('npm', $data["npm"]);
        $this->db->bind('jurusan', $data["jurusan"]);
        $this->db->bind('alamat', $data["alamat"]);
        $this->db->bind('id', $data["id"]);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function cariDataMahasiswa(){
        $keyword = $_POST["keyword"];
        $query = "SELECT * FROM ". $this->tbl ." WHERE nama LIKE :keyword";
        $this->db->query($query);
        $this->db->bind('keyword', "%$keyword%");

        return $this->db->resultSet();
    }
}