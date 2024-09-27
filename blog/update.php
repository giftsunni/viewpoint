<?php
include '../admin/database.php';

if (isset($_POST['action']) && isset($_POST['unique_id'])) {
    $action = $_POST['action'];
    $unique_id = $_POST['unique_id'];
    
    // Allow continuous likes or dislikes without checking cookies
    if ($action === 'like') {
        // Increase the like count with each click
        $query = "UPDATE post SET likes = likes + 1 WHERE unique_id = '$unique_id'";
    } elseif ($action === 'dislike') {
        // Increase the dislike count with each click
        $query = "UPDATE post SET dislikes = dislikes + 1 WHERE unique_id = '$unique_id'";
    }

    // Execute the query
    if (mysqli_query($conn, $query)) {
        // Fetch the updated like and dislike counts
        $result = mysqli_query($conn, "SELECT likes, dislikes FROM post WHERE unique_id = '$unique_id'");
        $post = mysqli_fetch_assoc($result);

        echo json_encode(['success' => true, 'likes' => $post['likes'], 'dislikes' => $post['dislikes']]);
    } else {
        echo json_encode(['success' => false]);
    }
} else {
    echo json_encode(['success' => false]);
}
?>
