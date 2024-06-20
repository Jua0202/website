<?php
$host = "localhost"; // Lokasi server MySQL (localhost jika dijalankan secara lokal)
$user = "root"; // Username MySQL
$password = ""; // Password MySQL (kosong jika tidak ada)
$db = "website"; // Nama database yang ingin Anda hubungkan

// Membuat koneksi ke database
$conn = new mysqli($host, $user, $password, $db);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>
