<?php

require './database.php';

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (empty($email)) {
        $_SESSION['message'] = "Email is required";
        $_SESSION['message_type'] = "error";
        header('location: ./login');
        exit();
    } 
    if (empty($password)) {
        $_SESSION['message'] = "Password is required";
        $_SESSION['message_type'] = "error";
        header('location: ./login');
        exit();
    } else {
        // Escape user inputs for security
        $email = $conn->real_escape_string($email);
        $password = $conn->real_escape_string($password);

        // FETCH USER FROM DATABASE
        $query = "SELECT * FROM admin WHERE email='$email'";
        $result = $conn->query($query);

        if ($result->num_rows == 1) {
            // CONVERT THE RECORD TO ASSOC ARRAY
            $admin = $result->fetch_assoc();
            $db_password = $admin['password']; // THIS WILL FETCH THE HASHED PWD

            // Echo the hashed password for debugging purposes
            echo "Hashed password: " . $db_password;

            // LET COMPARE PASSWORD WITH DATABASE PASSWORD
            if (password_verify($password, $db_password)) {
                // SET SESSION FOR ACCESS CONTROL
                $_SESSION['adminId'] = $admin['id'];
                // SET SESSION IF USER IS AN ADMIN
                $_SESSION['admin'] = true;

                // LOG USER IN
                $_SESSION['message'] = "Login successful as admin.";
                $_SESSION['message_type'] = "success";
                header('location: ./dashboard');
                exit();
            } else {
                $_SESSION['message'] = "Incorrect password";
                $_SESSION['message_type'] = "error";
            }
        } else {
            $_SESSION['message'] = "User not found";
            $_SESSION['message_type'] = "error";
        }
    }

    $conn->close();
    $_SESSION['message'] = "incorrect password or email";
    $_SESSION['message_type'] = "error";
    header('location: ./login'); // Redirect back to the form page
    exit();
} else {
    $_SESSION['message'] = "Check your input";
    $_SESSION['message_type'] = "error";
    header('location: ./login');
    exit();
}
?>
