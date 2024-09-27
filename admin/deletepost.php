<?php
require './database.php'; // Include your database connection file

if (isset($_GET['unique_id'])) {
    $unique_id = mysqli_real_escape_string($conn, $_GET['unique_id']);

    // Fetch the current post to remove the image file if it exists
    $query = "SELECT dimage FROM post WHERE unique_id = '$unique_id'";
    $result = mysqli_query($conn, $query);
    
    if ($result && mysqli_num_rows($result) > 0) {
        $post = mysqli_fetch_assoc($result);
        $imagePath = $post['dimage'];

        // Delete image file if it exists
        if (!empty($imagePath) && file_exists('uploads/' . $imagePath)) {
            unlink('uploads/' . $imagePath);
        }

        // Delete post from the database
        $deleteQuery = "DELETE FROM post WHERE unique_id = '$unique_id'";
        if (mysqli_query($conn, $deleteQuery)) {
            $_SESSION['message'] = "Post deleted successfully.";
            $_SESSION['message_type'] = 'success';

            // Redirect to posts list page after successful deletion
            header("Location: post");
            exit();
        } else {
            $_SESSION['message'] = "Error deleting post: " . mysqli_error($conn);
            $_SESSION['message_type'] = 'danger';

            // Redirect back to details page on error
            header("Location: details?unique_id=$unique_id");
            exit();
        }
    } else {
        $_SESSION['message'] = "Post not found.";
        $_SESSION['message_type'] = 'danger';

        // Redirect back to details page if post is not found
        header("Location: details?unique_id=$unique_id");
        exit();
    }
} else {
    // Redirect if no unique_id provided
    $_SESSION['message'] = "No post ID provided.";
    $_SESSION['message_type'] = 'danger';
    header("Location: details");
    exit();
}
?>
