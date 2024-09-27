<?php
require './database.php'; // Include your database connection file

if (isset($_POST['unique_id'])) {
    $unique_id= mysqli_real_escape_string($conn, $_POST['unique_id']);

    // Delete the category
    $query = "DELETE FROM post WHERE unique_id = '$unique_id'";
    
    if (mysqli_query($conn, $query)) {
        header("Location: pagecreate?unique_id=$unique_id"); // Redirect to a success page
        $_SESSION['pagecreate-success'] = "Delete $unique_id successfully!";
    }else {
        $_SESSION['pagecreate'] = "Database error: " . mysqli_error($conn);
        $_SESSION['pagecreate-error?unique_id=$unique_id'] = $_POST;
        
    }
}

mysqli_close($conn);
?>
