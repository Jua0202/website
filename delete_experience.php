<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $experience_id = $_POST['experience_id'];

    // Koneksi ke database
    $conn = new mysqli('localhost', 'root', '', 'website');

    // Cek koneksi
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "DELETE FROM experience WHERE id=$experience_id";

    if ($conn->query($sql) === TRUE) {
        echo "experience deleted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
