<?php
// Include necessary files and perform session validation
session_start();
include('db.php');

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    // Redirect to the login page if not logged in
    header("Location: login.php");
    exit();
}

// Check if the request method is POST and if the required parameters are set
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['comment_id']) && isset($_POST['new_comment'])) {
    // Sanitize input data
    $commentId = mysqli_real_escape_string($conn, $_POST['comment_id']);
    $newComment = mysqli_real_escape_string($conn, $_POST['new_comment']);

    // Update the comment in the database
    $updateQuery = "UPDATE comments SET content = '$newComment' WHERE CommentID = '$commentId' AND UserID = '{$_SESSION['user_id']}'";
    $result = $conn->query($updateQuery);

    if ($result) {
        // Comment updated successfully
        echo "Comment updated successfully";
    } else {
        // Error updating comment
        echo "Error updating comment: " . $conn->error;
    }
} else {
    // Invalid request
    echo "Invalid request";
}
?>
