<?php

/**
 * Friendzone - All Posts Page
 *
 * This page displays all posts, allows users to search for other users by name,
 * and provides functionalities for viewing posts, commenting, and searching. Users
 * can only access the search feature if they are logged in. The page includes sections
 * for displaying all posts, searching for users, and commenting on posts.
 */

// Include necessary files and perform session validation
session_start();
include('db.php');

// Logout logic
if (isset($_GET['logout'])) {
    // Destroy the session and redirect to index.php
    session_destroy();
    header("Location: index.php");
    exit();
}

// Search logic (only if the user is logged in)
$searchResult = null;
if (isset($_SESSION['user_id']) && $_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['search'])) {
    $searchTerm = $_GET['search'];

    // Perform a search query based on the provided name
    $searchQuery = "SELECT * FROM users WHERE Name LIKE '%$searchTerm%'";
    $searchResult = $conn->query($searchQuery);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Friendzone</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <style>
        /* Common styles for both desktop and mobile */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f0f2f5;
            /* Facebook background color */
            padding: 20px;
        }

        h1.header {
            color: #1877f2;
            /* Facebook blue */
            text-align: center;
        }

        .header-buttons {
            margin-bottom: 20px;
            text-align: center;
        }

        .post {
            background-color: #fff;
            border: 1px solid #ddd;
            padding: 15px;
            margin-bottom: 20px;
            /* Increased margin for better separation */
            border-radius: 10px;
            /* Rounded corners */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            /* Drop shadow */
        }

        h2 {
            color: #1877f2;
            /* Facebook blue */
        }

        small {
            color: #606770;
            /* Facebook text color */
        }

        button {
            margin-right: 10px;
        }

        .search-container {
            margin-top: 20px;
            text-align: center;
        }

        .search-container input {
            padding: 10px;
            margin-right: 5px;
            border: 1px solid #ddd;
            border-radius: 25px;
            /* Round input corners */
            width: 60%;
            /* Adjust width for better responsiveness */
        }

        .search-container button {
            padding: 10px;
            border: none;
            border-radius: 25px;
            /* Round button corners */
            background-color: #1877f2;
            /* Facebook blue */
            color: #fff;
            cursor: pointer;
        }

        .search-results {
            margin-top: 20px;
        }

        .search-result {
            background-color: #fff;
            border: 1px solid #ddd;
            padding: 15px;
            margin-bottom: 20px;
            /* Increased margin */
            border-radius: 10px;
            /* Rounded corners */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            /* Drop shadow */
        }

        .comment-container {
            margin-top: 10px;
        }

        .comment-container textarea {
            width: 100%;
            padding: 10px;
            margin-top: 10px;
            /* Increased margin */
            border: 1px solid #ddd;
            border-radius: 10px;
            /* Rounded corners */
            resize: none;
        }

        .comment-container button {
            padding: 10px;
            margin-top: 10px;
            /* Increased margin */
            border: none;
            border-radius: 10px;
            /* Rounded corners */
            background-color: #1877f2;
            /* Facebook blue */
            color: #fff;
            cursor: pointer;
        }

        .comment {
            background-color: #f0f2f5;
            /* Facebook background color */
            border: 1px solid #ddd;
            padding: 10px;
            margin-top: 10px;
            border-radius: 10px;
            /* Rounded corners */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            /* Drop shadow */
        }

        .comment small {
            color: #606770;
            /* Facebook text color */
            display: block;
            margin-top: 5px;
        }

        /* Mobile-specific styles */
        @media only screen and (max-width: 600px) {
            .search-container input {
                width: 100%;
                /* Full width on smaller screens */
            }
        }

        .like-container,
        .share-container {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-top: 10px;
        }

        .like-btn,
        .share-btn {
            padding: 8px;
            margin-right: 10px;
            cursor: pointer;
        }

        .like-btn {
            background-color: #1877f2;
            /* Facebook blue */
            color: #fff;
            border: none;
            border-radius: 10px;
            /* Rounded corners */
        }

        .share-btn {
            background-color: #38a1f3;
            /* Lighter blue for share button */
            color: #fff;
            border: none;
            border-radius: 10px;
            /* Rounded corners */
        }

        .like-count {
            color: #606770;
            /* Facebook text color */
            font-size: 14px;
        }

        .like-btn:hover,
        .share-btn:hover {
            filter: brightness(90%);
        }
    </style>

</head>

<body>
    <h1 class="header">Friendzone</h1>
    <?php
    include('db.php');

    // Check if the user is logged in
    $loggedIn = isset($_SESSION['user_id']);

    // Display login/register buttons if not logged in
    if (!$loggedIn) {
        echo "<div class='header-buttons'>";
        echo "<button class='btn btn-primary' onclick=\"location.href='index.php'\">Home</button>";
        echo "<button class='btn btn-primary' onclick=\"location.href='login.php'\">Login</button>";
        echo "<button class='btn btn-primary' onclick=\"location.href='register.php'\">Register</button>";
        echo "</div>";
    } else {
        // Display profile and create post buttons if logged in
        echo "<div class='header-buttons'>";
        echo "<button class='btn btn-primary' onclick=\"location.href='index.php'\">Home</button>";
        echo "<button class='btn btn-primary' onclick=\"location.href='dashboard.php'\">Profile</button>";
        echo "<button class='btn btn-primary' onclick=\"location.href='create-post.php'\">Create Post</button>";
        echo "</div>";
    }
    ?>

    <?php if (isset($_SESSION['user_id'])) : ?>
        <div class="search-container">
            <form action="index.php" method="get">
                <input type="text" name="search" placeholder="Search by name">
                <button type="submit">Search</button>
            </form>
        </div>

        <?php if (isset($searchResult)) : ?>
            <div class="search-results">
                <h3>Search Results:</h3>
                <?php while ($row = $searchResult->fetch_assoc()) : ?>
                    <p>Name: <?php echo $row['Name']; ?> | Email: <?php echo $row['email']; ?></p>
                <?php endwhile; ?>
            </div>
        <?php endif; ?>
    <?php else : ?>
        <p>Please log in to use the search feature.</p>
    <?php endif; ?>

    <!-- Display All Posts Section -->
    <h2>All Posts:</h2>
    <?php
    // Fetch all posts ordered by the date posted
    $sqlPosts = "SELECT posts.*, users.Name as UserName FROM posts JOIN users ON posts.user_id = users.UserID ORDER BY created_at DESC";
    $resultPosts = $conn->query($sqlPosts);

    while ($rowPost = $resultPosts->fetch_assoc()) {
        echo "<div class='post'>";
        echo "<p>{$rowPost['post_content']}</p>";
        echo "<p><small>Posted on: {$rowPost['created_at']} by {$rowPost['UserName']}</small></p>";

        // Comment Section
        if ($loggedIn) {
            echo "<div class='comment-container'>";
            echo "<form action='add-comment.php' method='post'>";
            echo "<input type='hidden' name='PostID' value='{$rowPost['PostID']}'>";
            echo "<textarea name='comment_content' placeholder='Write a comment'></textarea>";
            echo "<button type='submit'>Comment</button>";
            echo "</form>";
            echo "</div>";
        }

        // Like Section
        echo "<div class='like-container'>";
        echo "<button class='btn btn-secondary like-btn' data-postid='{$rowPost['PostID']}'>Like</button>";
        echo "<span class='like-count'>{$rowPost['likes']} Likes</span>";
        echo "</div>";

        // Share Section
        echo "<div class='share-container'>";
        echo "<button class='btn btn-info share-btn' data-postid='{$rowPost['PostID']}'>Share</button>";
        echo "</div>";


        // Display Comments
        $postId = $rowPost['PostID'];
        $sqlComments = "SELECT comments.*, users.Name as UserName FROM comments JOIN users ON comments.UserID = users.UserID WHERE PostID = '$postId' ORDER BY timestamp DESC";
        $resultComments = $conn->query($sqlComments);

        while ($rowComment = $resultComments->fetch_assoc()) {
            echo "<div class='comment'>";
            echo "<p>{$rowComment['content']}</p>";
            echo "<p><small>Commented by: {$rowComment['UserName']} | {$rowComment['timestamp']}</small></p>";
            echo "</div>";
        }

        echo "</div>"; // Close post div
    }
    ?>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>

    <script>
        function goBack() {
            window.history.back();
        }
        // Script for Likes
        $(document).ready(function() {
            $('.like-btn').click(function() {
                const postId = $(this).data('postid');
                const likeCountSpan = $('#like-count-' + postId);

                // Make an AJAX request to update the like count
                $.ajax({
                    type: 'POST',
                    url: 'like-post.php',
                    data: {
                        post_id: postId
                    },
                    success: function(newLikeCount) {
                        // Update the like count on the client side
                        likeCountSpan.text(newLikeCount + ' Likes');
                    },
                    error: function(xhr, status, error) {
                        console.error('Error updating like count:', error);
                    }
                });
            });
        });

        // Script for Share Button
        document.addEventListener('DOMContentLoaded', function() {
            const shareButtons = document.querySelectorAll('.share-btn');

            shareButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const postId = this.dataset.postid;

                    // Generate a shareable link
                    const shareLink = `${window.location.origin}/friendzone/view-post.php?post_id=${postId}`;

                    // Create a temporary input to copy the link to the clipboard
                    const tempInput = document.createElement('input');
                    tempInput.value = shareLink;
                    document.body.appendChild(tempInput);
                    tempInput.select();
                    document.execCommand('copy');
                    document.body.removeChild(tempInput);

                    // Inform the user that the link has been copied
                    alert(`Share link copied to clipboard: ${shareLink}`);
                });
            });
        });
    </script>
</body>

</html>