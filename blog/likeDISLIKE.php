<?php
// Database connection
include '../admin/database.php';

if (isset($_POST['comment_id']) && isset($_POST['actionn'])) {
    $comment_id = $_POST['comment_id'];
    $actionn = $_POST['actionn'];
    
    // Fetch current like/dislike counts
    $query = "SELECT total_likes, total_dislikes FROM comments WHERE id = $comment_id";
    $result = mysqli_query($conn, $query);
    $comment = mysqli_fetch_assoc($result);

    if ($actionn == 'like') {
        // Increment the like count
        $new_likes = $comment['total_likes'] + 1;
        $updateQuery = "UPDATE comments SET total_likes = $new_likes WHERE id = $comment_id";
    } elseif ($actionn == 'dislike') {
        // Increment the dislike count
        $new_dislikes = $comment['total_dislikes'] + 1;
        $updateQuery = "UPDATE comments SET total_dislikes = $new_dislikes WHERE id = $comment_id";
    }

    // Execute the update query
    if (mysqli_query($conn, $updateQuery)) {
        $response = [
            'success' => true,
            'likes' => ($actionn == 'like') ? $new_likes : $comment['total_likes'],
            'dislikes' => ($actionn == 'dislike') ? $new_dislikes : $comment['total_dislikes']
        ];
    } else {
        $response = ['success' => false];
    }

    // Send response back as JSON
    echo json_encode($response);
}
?>
