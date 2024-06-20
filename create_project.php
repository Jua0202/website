<?php
include 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $message = $_POST['message'];
    
    // Proses unggah file gambar
    $image_name = $_FILES['image']['name'];
    $image_tmp_name = $_FILES['image']['tmp_name'];
    $image_size = $_FILES['image']['size'];
    $image_type = $_FILES['image']['type'];

    // Tentukan direktori tempat penyimpanan gambar di server
    $target_dir = "uploads/"; // Pastikan direktori ini ada di tempat yang benar
    $target_file = $target_dir . basename($image_name);

    // Pindahkan file yang diunggah ke direktori yang ditentukan
    if (move_uploaded_file($image_tmp_name, $target_file)) {
        echo "File berhasil diunggah.";
        
        // Simpan informasi proyek ke database
        $sql = "INSERT INTO projects (image, title, message) VALUES ('$target_file', '$title', '$message')";

        if ($conn->query($sql) === TRUE) {
            echo " Proyek baru berhasil dibuat.";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Maaf, terjadi kesalahan saat mengunggah file.";
    }

    $conn->close();
}
?>