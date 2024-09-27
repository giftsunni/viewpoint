<?php

require './database.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $unique_id = mysqli_real_escape_string($conn, $_POST['unique_id']);  // Sanitize unique_id input
    $dtitle = mysqli_real_escape_string($conn, $_POST['dtitle']);
    $category = mysqli_real_escape_string($conn, $_POST['category']);
    $subcategory = mysqli_real_escape_string($conn, $_POST['subcategory']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);

    // Handle file upload if a new file is provided
    if (!empty($_FILES['dimage']['name'])) {
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["dimage"]["name"]);
        
        if (move_uploaded_file($_FILES["dimage"]["tmp_name"], $target_file)) {
            $dimage = $_FILES["dimage"]["name"];
        } else {
            // Set session message if file upload fails
            $_SESSION['message'] = "Failed to upload image.";
            $_SESSION['message_type'] = "error";
            header("Location: details?unique_id=$unique_id");
            exit();
        }
    } else {
        // If no new file is provided, keep the old file name
        $query = "SELECT dimage FROM post WHERE unique_id='$unique_id'";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_assoc($result);
        $dimage = $row['dimage'];
    }

    // Update the post in the database
    $query = "UPDATE post SET dtitle='$dtitle', category='$category', subcategory='$subcategory', description='$description', dimage='$dimage' WHERE unique_id='$unique_id'";

    if (mysqli_query($conn, $query)) {
        $_SESSION['message'] = "Updated post $unique_id successfully!";
        $_SESSION['message_type'] = "success";
        header("Location: details?unique_id=$unique_id");
        exit();
    } else {
        $_SESSION['message'] = "Database error: " . mysqli_error($conn);
        $_SESSION['message_type'] = "error";
        header("Location: details?unique_id=$unique_id");
        exit();
    }
}
?>
