<?php

ob_start();
session_start();
if (!isset($_SESSION['admin_id'])) {
    header("Location: login.php");
    exit();
}

include('connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $post_id = mysqli_real_escape_string($conn, $_POST['post_id']);
    $post_title = mysqli_real_escape_string($conn, $_POST['post_title']);
    $post_description = mysqli_real_escape_string($conn, $_POST['post_description']);

    $query = "UPDATE posts SET post_title = '$post_title', post_description = '$post_description' WHERE id = '$post_id'";
    
    if (mysqli_query($conn, $query)) {
        $_SESSION['message'] = "Post updated successfully!";
        $_SESSION['message_type'] = "success";
    } else {
        $_SESSION['message'] = "Error updating post. Please try again.";
        $_SESSION['message_type'] = "danger";
    }
    header("Location: manage_posts.php");
    exit();
}
?>