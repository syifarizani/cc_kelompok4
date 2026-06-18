<?php
// Catatan: Nanti teks di bawah ini diganti dengan IP Privat Instance Database Server kamu di AWS
$host     = "IP_PRIVAT_DATABASE_SERVER_KAMU"; 
$user     = "admin"; 
$password = "kelompok4"; 
$database = "db_cloud";

$conn = mysqli_connect($host, $user, $password, $database);

if (!$conn) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}
?>
