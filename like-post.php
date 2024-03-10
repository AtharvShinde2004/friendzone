<?php
session_start();
include('db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $postId = $_POST['post_id'];

    // Update the like count in the database
    $updateLikesQuery = "UPDATE posts SET likes = likes + 1 WHERE PostID = '$postId'";
    if ($conn->query($updateLikesQuery) === TRUE) {
        // Fetch the updated like count and return it
        $getLikesQuery = "SELECT likes FROM posts WHERE PostID = '$postId'";
        $result = $conn->query($getLikesQuery);
        $row = $result->fetch_assoc();
        echo $row['likes'];
    } else {
        echo "Error updating like count: " . $conn->error;
    }
}

$conn->close();
