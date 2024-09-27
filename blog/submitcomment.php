<?php
require '../admin/database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validate and sanitize inputs
    $unique_id = $_POST['unique_id'];
    $parent_id = isset($_POST['parent_id']) ? (int)$_POST['parent_id'] : 0; // Default to 0 for top-level commentsotherwise the comment ID for a reply
    $author = $_POST['author'];
    $email = $_POST['email'];
    $content = $_POST['comment'];

    if (!$author) {
        $_SESSION['message'] = "Author name is required";
        $_SESSION['message_type'] = "error";
        exit();
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['message'] = "Invalid email format";
        $_SESSION['message_type'] = "error";
        exit();
    }

    if (!$content) {
        $_SESSION['message'] = "Comment content is required";
        $_SESSION['message_type'] = "error";
        exit();
    }

    // If all inputs are valid, proceed with inserting into the database
    $query = "INSERT INTO comments (unique_id, parent_id, author, email, content, created_at) VALUES ('$unique_id', '$parent_id', '$author', '$email', '$content', NOW())";

    if ($conn->query($query) === TRUE) {
        $_SESSION['message'] = "Comment submitted successfully!";
        $_SESSION['message_type'] = "success";
    } else {
        $_SESSION['message'] = "Error: " . $conn->error;
        $_SESSION['message_type'] = "error";
    }

     // Redirect back to the post page after submission
     header("Location: singlepost?unique_id=" . $unique_id);  // Redirect to the same post page
     exit();
}
?>
