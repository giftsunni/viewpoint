<?php
require './database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $errors = [];
    $adminid = $_SESSION['admin'];

    if (isset($_POST['action'])) {
        if ($_POST['action'] === 'update_profile') {
            $username = $conn->real_escape_string($_POST['username']);
            $email = $conn->real_escape_string($_POST['email']);
            $phone = $conn->real_escape_string($_POST['phone']);

            // Validate phone phone
            if (!preg_match('/^\d{1,11}$/', $phone)) {
                $errors[] = "Phone phone must be a phone and up to 11 digits.";
            }

            if (empty($errors)) {
                $profileQuery = "UPDATE admin SET username='$username', email='$email', phone='$phone' WHERE id='$adminid'";

                if ($conn->query($profileQuery) === TRUE) {
                    $_SESSION['message'] = "Profile updated successfully.";
                    $_SESSION['message_type'] = "success";
                } else {
                    $_SESSION['message'] = "Error updating profile: " . $conn->error;
                    $_SESSION['message_type'] = "danger";
                }
            } else {
                $_SESSION['message'] = implode("<br>", $errors);
                $_SESSION['message_type'] = "danger";
            }
        }

        if ($_POST['action'] === 'change_password') {
            $newpass = $_POST['newpass'];
            $compass = $_POST['compass'];

            if (empty($newpass) || empty($compass)) {
                $errors[] = "New password and confirmation password are required.";
            } elseif ($newpass !== $compass) {
                $errors[] = "Passwords do not match.";
            } elseif (strlen($newpass) < 6) {
                $errors[] = "Password must be at least 6 characters long.";
            }

            if (empty($errors)) {
                $hashedPassword = password_hash($newpass, PASSWORD_DEFAULT);
                $passwordQuery = "UPDATE admin SET password='$hashedPassword' WHERE id='$adminid'";

                if ($conn->query($passwordQuery) !== TRUE) {
                    $errors[] = "Error updating password: " . $conn->error;
                } else {
                    $_SESSION['message'] = "Password changed successfully.";
                    $_SESSION['message_type'] = "success";
                }
            } else {
                $_SESSION['message'] = implode("<br>", $errors);
                $_SESSION['message_type'] = "danger";
            }
        }
    }

    // Redirect back to the profile page
    header("Location: profile");
    exit();
}
?>
