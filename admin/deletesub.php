<?php
require './database.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']); // Ensure the ID is an integer

    // Prepare the SQL DELETE statement
    $query = "DELETE FROM subcategory WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id);

    // Execute the statement
    if ($stmt->execute()) {
        // Set success message in the session
        $_SESSION['message'] = "Subcategory deleted successfully.";
        $_SESSION['message_type'] = "success";
    } else {
        // Set error message in the session
        $_SESSION['message'] = "Failed to delete the subcategory.";
        $_SESSION['message_type'] = "error";
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();

    // Redirect back to the subscription category page
    header("Location: subcatgory");
    exit();
}
?>
