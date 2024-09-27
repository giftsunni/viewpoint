<?php
require './database.php'; // Database connection

if (isset($_GET['id'])) {
    $categoryId = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

    if ($categoryId) {
        // Prepare and execute delete query
        $stmt = $conn->prepare("DELETE FROM category WHERE id = ?");
        $stmt->bind_param("i", $categoryId);

        if ($stmt->execute()) {
            $_SESSION['message'] = "Category deleted successfully.";
            $_SESSION['message_type'] = "success";
        } else {
            $_SESSION['message'] = "Error deleting category: " . $conn->error;
            $_SESSION['message_type'] = "error";
        }

        $stmt->close();
    } else {
        $_SESSION['message'] = "Invalid category ID.";
        $_SESSION['message_type'] = "error";
    }

    header("Location: categories"); // Redirect back to the category management page
    exit();
}
?>
