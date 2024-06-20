<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $project_id = $_POST['project_id'];

    // Koneksi ke database
    $conn = new mysqli('localhost', 'root', '', 'website');

    // Cek koneksi
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "DELETE FROM projects WHERE id=$project_id";

    if ($conn->query($sql) === TRUE) {
        echo "Project deleted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
