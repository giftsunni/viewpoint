<?php
require './database.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $planId = $_POST['planId'];

    if (!empty($planId)) {
        $planId = intval($planId);
        $query = "DELETE FROM plans WHERE id = $planId";
        
        if ($conn->query($query) === TRUE) {
            $_SESSION['message'] = "Plan deleted successfully.";
            $_SESSION['message_type'] = "success";
        } else {
            $_SESSION['message'] = "Error deleting plan: " . $conn->error;
            $_SESSION['message_type'] = "error";
        }
    } else {
        $_SESSION['message'] = "Invalid plan ID.";
        $_SESSION['message_type'] = "error";
    }
    
    $conn->close();
    header("Location: category");
    exit;
}
?>
