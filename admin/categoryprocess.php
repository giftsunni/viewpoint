<?php
require './database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $category = $_POST['category'];
    $isError = false; // Initialize error flag

    // Validate form data
    if (empty($category)) {
        $_SESSION['message'] = "Enter post category";
        $_SESSION['message_type'] = "error";
        $isError = true;
    } else {
        // Insert the category into the database
        $sql = "INSERT INTO category (category) VALUES ('$category')";

        if (mysqli_query($conn, $sql)) {
            $_SESSION['message'] = "Category added successfully!";
            $_SESSION['message_type'] = "success";
            header('Location: ./categories');
            exit();
        } else {
            $_SESSION['message'] = "Error adding category.";
            $_SESSION['message_type'] = "error";
            $_SESSION['category-data'] = $_POST; // Store form data in session
            header('Location: ./categories');
            exit();
        }
    }

    if ($isError) {
        header('Location: ./categories');
        exit();
    }
}
?>
