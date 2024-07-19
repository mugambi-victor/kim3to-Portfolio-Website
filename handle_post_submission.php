<?php
include('connection.php');


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    /**
     * Initialize error variables
     */
    $errors = array();

    /**
     * Validate data
     */
    if (!isset($_POST['postTitle']) || empty(trim($_POST['postTitle']))) {
        $errors[] = "Post title is required.";
    }

    if (!isset($_POST['postDescription']) || empty(trim($_POST['postDescription']))) {
        $errors[] = "Post description is required.";
    }

    /**
     * Handle file upload
     */
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["postImage"]["name"]);

    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $check = getimagesize($_FILES["postImage"]["tmp_name"]);

    if ($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        if (move_uploaded_file($_FILES["postImage"]["tmp_name"], $target_file)) {
            echo "The file " . htmlspecialchars(basename($_FILES["postImage"]["name"])) . " has been uploaded.";

            /**
             * Prepare data for insertion into the database
             */
            $postTitle = trim($_POST['postTitle']);
            $postDescription = trim($_POST['postDescription']);
            $postImage = $target_file;

            /**
             * Insert data into the database
             */
            $sql =mysqli_query($conn, "INSERT INTO posts values(0,'$postTitle','$postDescription', '$postImage')");
           if($sql){
            echo "Post saved successfully.";
            header("Location: index.php");
           }
           
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    } else {
        echo "File is not an image.";
    }

    /**
     * Display any errors
     */
    if (!empty($errors)) {
        foreach ($errors as $error) {
            echo "<p>{$error}</p>";
        }
    } else {
    }
} else {
    /**
     * Not a post request? redirect to the index
     */
    header("Location: index.php");
    exit;
}
