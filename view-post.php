<?php
// Include necessary files and perform session validation
session_start();
include('db.php');

// Check if post_id is provided in the URL
if (isset($_GET['post_id'])) {
    $postId = $_GET['post_id'];

    // Fetch the post details from the database
    $sqlPost = "SELECT posts.*, users.Name as UserName FROM posts JOIN users ON posts.user_id = users.UserID WHERE PostID = '$postId'";
    $resultPost = $conn->query($sqlPost);

    if ($resultPost->num_rows > 0) {
        $rowPost = $resultPost->fetch_assoc();
        $postContent = $rowPost['post_content'];
        $postCreatedAt = $rowPost['created_at'];
        $userName = $rowPost['UserName'];
    } else {
        // Redirect to an error page if the post is not found
        header("Location: error.php");
        exit();
    }

    // Fetch comments for the post
    $sqlComments = "SELECT comments.*, users.Name as UserName FROM comments JOIN users ON comments.UserID = users.UserID WHERE PostID = '$postId' ORDER BY timestamp DESC";
    $resultComments = $conn->query($sqlComments);
} else {
    // Redirect to an error page if post_id is not provided
    header("Location: error.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Include meta tags, stylesheets, and scripts as needed -->
    <title>View Post - Friendzone</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <style>
        /* Add your styles here or link to an external CSS file */
        /* Common styles for both desktop and mobile */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f0f2f5;
            /* Facebook background color */
            padding: 20px;
        }

        .header {
            color: #1877f2;
            /* Facebook blue */
            text-align: center;
            margin-bottom: 20px;
        }

        .header-buttons {
            margin-bottom: 20px;
            text-align: center;
        }

        .btn-primary {
            background-color: #1877f2;
            /* Facebook blue */
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            color: #fff;
            cursor: pointer;
        }

        .btn-primary:hover {
            background-color: #166fe5;
            /* Darker shade of blue on hover */
        }
    </style>
</head>

<body>
    <!-- Navigation links and buttons -->
    <div class="container mt-3">
        <h1 class="header">Friendzone</h1>
        <div class="header-buttons">
            <?php
            // Check if the user is logged in
            $loggedIn = isset($_SESSION['user_id']);

            // Display login/register buttons if not logged in
            if (!$loggedIn) {
                echo "<a href='index.php' class='btn btn-primary'>Home</a>";
                echo "<a href='login.php' class='btn btn-primary'>Login</a>";
                echo "<a href='register.php' class='btn btn-primary'>Register</a>";
            } else {
                // Display home button if logged in
                echo "<a href='index.php' class='btn btn-primary'>Home</a>";
            }
            ?>
        </div>
    </div>

    <!-- Display Post Content -->
    <div class="container mt-5">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title"><?php echo $userName; ?>'s Post</h5>
                <p class="card-text"><?php echo $postContent; ?></p>
                <p class="card-text"><small class="text-muted">Posted on: <?php echo $postCreatedAt; ?></small></p>
            </div>
        </div>
    </div>

    <!-- Display Comments -->
    <div class="container mt-4">
        <h5>Comments:</h5>
        <?php
        while ($rowComment = $resultComments->fetch_assoc()) {
            echo "<div class='card mt-3'>";
            echo "<div class='card-body'>";
            echo "<p class='card-text'>{$rowComment['content']}</p>";
            echo "<p class='card-text'><small class='text-muted'>Commented by: {$rowComment['UserName']} | {$rowComment['timestamp']}</small></p>";
            echo "</div>";
            echo "</div>";
        }
        ?>
    </div>

    <!-- Include Bootstrap and other scripts as needed -->
</body>

</html>
<?php require('footer.php'); ?>