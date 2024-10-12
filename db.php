<?php
// Konfigurasi database
$servername = "localhost";
$username = "root"; // Ganti dengan username MySQL Anda jika berbeda
$password = "";     // Ganti dengan password MySQL Anda jika ada
$dbname = "kpop_merchandise";

// Buat koneksi menggunakan mysqli
$conn = new mysqli($servername, $username, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>