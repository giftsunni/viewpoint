
<?php
    // session_start(); // Start the session

    // Authentication check
    if (!isset($_SESSION['adminId']) || !isset($_SESSION['admin']) || $_SESSION['admin'] !== true) {
        // Redirect to login page
        $_SESSION['message'] = "You need to log in as an admin to access this page.";
        $_SESSION['message_type'] = "error";
        header('location: ./login');
        exit();
    }
    ?>
