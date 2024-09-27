<?php
require './database.php'; 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve POST data and sanitize it
    $categoryId = filter_input(INPUT_POST, 'categoryId', FILTER_SANITIZE_NUMBER_INT);
    $categoryName = filter_input(INPUT_POST, 'category', FILTER_SANITIZE_STRING);

    if ($categoryId && $categoryName) {
        // Prepare and execute update query
        $stmt = $conn->prepare("UPDATE category SET category = ? WHERE id = ?");
        $stmt->bind_param("si", $categoryName, $categoryId);

        if ($stmt->execute()) {
            $_SESSION['message'] = "Category updated successfully.";
            $_SESSION['message_type'] = "success";
        } else {
            $_SESSION['message'] = "Error updating category: " . $conn->error;
            $_SESSION['message_type'] = "error";
        }

        $stmt->close();
    } else {
        $_SESSION['message'] = "Invalid input.";
        $_SESSION['message_type'] = "error";
    }

    header("Location: categories"); // Redirect back to the category management page
    exit();
}
?>
