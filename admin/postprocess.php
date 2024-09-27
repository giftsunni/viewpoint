<?php
require './database.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start(); // Ensure sessions are started

if (isset($_POST['submit'])) {
    $dtitle = htmlspecialchars(trim($_POST['dtitle'])); // Sanitize input
    $category = htmlspecialchars(trim($_POST['category']));
    $subcategory = htmlspecialchars(trim($_POST['subcategory']));
    $description = htmlspecialchars(trim($_POST['description']));
    $dimage = $_FILES['dimage'];
    $dstatus = 'pending';

    $isError = false; // Initialize error flag

    // Validate form data
    if (empty($dtitle)) {
        $isError = true;
        $_SESSION['message'] = "Enter post title";
        $_SESSION['message_type'] = "error";
    } elseif (empty($category)) {
        $isError = true;
        $_SESSION['message'] = "Enter post category";
        $_SESSION['message_type'] = "error";
    } elseif (empty($subcategory)) {
        $isError = true;
        $_SESSION['message'] = "Enter post subcategory";
        $_SESSION['message_type'] = "error";
    } elseif (empty($description)) {
        $isError = true;
        $_SESSION['message'] = "Enter post description";
        $_SESSION['message_type'] = "error";
    } elseif (empty($dimage['name'])) {
        $isError = true;
        $_SESSION['message'] = "Choose post image";
        $_SESSION['message_type'] = "error";
    } else {
        $time = time(); // Make each file name unique

        // Process image
        $dimage_name = $time . '_' . preg_replace('/\s+/', '_', $dimage['name']);
        $dimage_tmp_name = $dimage['tmp_name'];
        $dimage_destination_path = 'uploads/' . $dimage_name;

        $allowed_image_files = ['png', 'jpg', 'jpeg', 'gif', 'bmp', 'avif'];
        $image_ext = pathinfo($dimage_name, PATHINFO_EXTENSION);
        if (in_array(strtolower($image_ext), $allowed_image_files)) {
            if ($dimage['size'] < 5_000_000) {
                if (!move_uploaded_file($dimage_tmp_name, $dimage_destination_path)) {
                    $isError = true;
                    $_SESSION['message'] = "Failed to upload image.";
                    $_SESSION['message_type'] = "error";
                }
            } else {
                $isError = true;
                $_SESSION['message'] = "Image file size too big. Should be less than 5MB.";
                $_SESSION['message_type'] = "error";
            }
        } else {
            $isError = true;
            $_SESSION['message'] = "Image file should be png, jpg, jpeg, gif, avif or bmp.";
            $_SESSION['message_type'] = "error";
        }
    }

    if (!$isError) {
        $unique_id = md5(date('ymdhis') . rand(1000000, 199999));
        $dtitle_safe = $conn->real_escape_string($dtitle); // Escape the title
        $description_safe = $conn->real_escape_string($description);

        $sql = "INSERT INTO post (dtitle, unique_id, description, dimage, category, subcategory, dstatus) VALUES ('$dtitle_safe', '$unique_id', '$description_safe', '$dimage_name', '$category', '$subcategory', '$dstatus')";

        if ($conn->query($sql) === TRUE) {
            $_SESSION['message'] = "Post added successfully!";
            $_SESSION['message_type'] = "success";
        } else {
            $_SESSION['message'] = "Error adding post: " . $conn->error;
            $_SESSION['message_type'] = "error";
        }
    }

    // Redirect after form submission to show the SweetAlert message
    header('Location: post');
    exit();
}
?>
