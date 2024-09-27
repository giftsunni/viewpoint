<?php
require './database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if unique_id and action are provided
    if (isset($_POST['unique_id']) && isset($_POST['action'])) {
        $postId = intval($_POST['unique_id']);
        $action = $_POST['action'];

        // Determine query based on the action
        $query = "";
        if ($action === 'activate') {
            $query = "UPDATE post SET dstatus = 'active' WHERE unique_id = $postId";
        } else {
            // Handle invalid action
            $_SESSION['message'] = "Invalid action.";
            $_SESSION['message_type'] = "error";
            header("Location: ./post?unique_id=$postId");
            exit();
        }

        // Execute the query
        if ($conn->query($query) === TRUE) {
            $_SESSION['message'] = "Post activated successfully!";
            $_SESSION['message_type'] = "success";  
            header("Location: ./active?unique_id=$postId");
        } else {
            $_SESSION['message'] = "Error activating post: " . $conn->error;
            $_SESSION['message_type'] = "error";
        }

        // Redirect back to a specific page, e.g., active page
        header("Location: ./post?unique_id=$postId");
        exit();
    } else {
        // Set an error message if required data is missing
        $_SESSION['message'] = "Missing data to activate post.";
        $_SESSION['message_type'] = "error";
        header("Location: ./post");
        exit();
    }
} else {
    // Redirect if the request is not POST
    header("Location: ./post");
    exit();
}
?>
