<?php
// Connect to the database
require './database.php'; // Ensure this file contains the correct database connection active

// Check if the post ID is provided
if (isset($_POST['unique_id'])) {
    $postId = $_POST['unique_id'];
    
    // Sanitize the input to prevent SQL injection
    $postId = mysqli_real_escape_string($conn, $postId);
    
    // Update the post status to 'disabled'
    $query = "UPDATE post SET dstatus = 'disabled' WHERE unique_id = '$postId'";
    
    if (mysqli_query($conn, $query)) {
        // Set a success message
        $_SESSION['message'] = "Post has been successfully disabled.";
        $_SESSION['message_type'] = "success";
    } else {
        // Set an error message
        $_SESSION['message'] = "Error disabling the post: " . mysqli_error($conn);
        $_SESSION['message_type'] = "danger";
    }
} else {
    // Set an error message if no ID is provided
    $_SESSION['message'] = "No post ID provided.";
    $_SESSION['message_type'] = "danger";
    header("Location: ./active?unique_id=$postId");
}

// Redirect back to the previous page or a page where the user can see the result
header("Location: ./active?unique_id=$postId");
exit;







