<?php
$server = "localhost";  // nama server
$user = "root"; // nama user
$pass = "";  // Password
$nama_db = "contoh"; // Nama Database

$conn = mysqli_connect($server, $user, $pass, $nama_db);

// Query untuk menampilkan data
$query = mysqli_query("SELECT * FROM contoh");

Kita looping semua data
$rows = [];
while($row = mysqli_fetch_assoc($query))
{
    $rows[] = $row;
}

// Nah jadi data-datanya sudah berhasil di looping dan di masukan kedalam variable $rows
?>
