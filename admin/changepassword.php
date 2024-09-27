<?php
require './database.php'; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the form inputs
    $newpass = $conn->real_escape_string($_POST['newpass']);
    $compass = $conn->real_escape_string($_POST['compass']);

    // Assume you have an `adminid` in your session
    $adminid = $_SESSION['admin']; 

    // Validate passwords: Ensure new password and confirm password match
    if ($newpass !== $compass) {
        $_SESSION['message'] = "Passwords do not match.";
        $_SESSION['message_type'] = "danger";
        header("Location: profile.php");
        exit();
    }

    // Password length validation
    if (strlen($newpass) < 8) {
        $_SESSION['message'] = "Password must be at least Eight characters long.";
        $_SESSION['message_type'] = "danger";
        header("Location: profile");
        exit();
    }

    // Hash the new password before saving it to the database
    $hashedPassword = password_hash($newpass, PASSWORD_DEFAULT);

    // Update the admin password in the database
    $query = "UPDATE admin SET password='$hashedPassword' WHERE id='$adminid'";

    if ($conn->query($query) === TRUE) {
        $_SESSION['message'] = "Password changed successfully.";
        $_SESSION['message_type'] = "success";
    } else {
        $_SESSION['message'] = "Error changing password: " . $conn->error;
        $_SESSION['message_type'] = "danger";
    }

    // Redirect back to the profile page
    header("Location: profile");
    exit();
}
?>
