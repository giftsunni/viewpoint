<?php
require './database.php'; // Update with your DB connection file

if (isset($_POST['saveChanges'])) {
    $id = $_POST['walletId'] ?? null; // Get the ID from the form
    $category = $_POST['category'];
    $subcategory = $_POST['subcategory'];

    if ($id) {
        // Update existing subcategory
        $query = "UPDATE subcategory SET category = ?, subcategory = ? WHERE id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('ssi', $category, $subcategory, $id);
    } else {
        // Add new subcategory
        $query = "INSERT INTO subcategory (category, subcategory) VALUES (?, ?)";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('ss', $category, $subcategory);
    }

    if ($stmt->execute()) {
        $_SESSION['message'] = "Subcategory " . ($id ? "updated" : "added") . " successfully.";
        $_SESSION['message_type'] = "success";
    } else {
        $_SESSION['message'] = "Error while " . ($id ? "updating" : "adding") . " subcategory.";
        $_SESSION['message_type'] = "error";
    }

    $stmt->close();
    header("Location: subcategory"); // Redirect to the subcategories page
    exit();
}
?>
