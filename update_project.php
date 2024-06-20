<?php
include 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get input data
    $project_id = $_POST['project_id'];
    $title = isset($_POST['title']) ? $_POST['title'] : '';
    $message = isset($_POST['message']) ? $_POST['message'] : '';
    
    // Check if a new image file is uploaded
    if (!empty($_FILES['image']['tmp_name'])) {
        // Process uploaded image
        $image_name = $_FILES['image']['name'];
        $image_tmp_name = $_FILES['image']['tmp_name'];
        $image_size = $_FILES['image']['size'];
        $image_type = $_FILES['image']['type'];

        // Specify the target directory for storing uploaded images
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($image_name);

        // Move the uploaded file to the target directory
        if (move_uploaded_file($image_tmp_name, $target_file)) {
            // Update database with new image path
            $sql = "UPDATE projects SET title='$title', message='$message', image='$target_file' WHERE id=$project_id";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    } else {
        // Update database without changing the image
        $sql = "UPDATE projects SET title='$title', message='$message' WHERE id=$project_id";
    }

    // Execute SQL query
    if ($conn->query($sql) === TRUE) {
        echo "Project updated successfully";
    } else {
        echo "Error updating project: " . $conn->error;
    }

    $conn->close();
}
?>
