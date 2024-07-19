<?php
session_start();

if (!isset($_SESSION['admin_id'])) {
    // Admin is not logged in, redirect to login page
    header("Location: login.php");
    exit();
}

include('header.php');
?>
<style>
    .create-post-container {
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
        }
        .form-box {
            width: 100%;
            max-width: 600px;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.1);
            background-color: #fff;
        }
</style>
    <div class="container create-post-container ">
        <div class="form-box">
        <form class=" " action="handle_post_submission.php" method="POST" enctype="multipart/form-data">
            <h4 class="text-center fw-bold text-dark ">Create Post</h4>
            <div class="form-group mb-3">
                <label for="postTitle" class="form-label text-grey ">Post Title</label>
                <input type="text" class="form-control" id="postTitle" name="postTitle" placeholder="Enter post title">
            </div>
            <div class="form-group mb-3">
                <label for="postDescription" class="form-label text-grey">Post Description</label>
                <textarea class="form-control" id="postDescription" name="postDescription" rows="3" placeholder="Enter post description" ></textarea>
            </div>
            <div class="form-group mb-3">
                <label for="postImage" class="form-label text-grey">Post Image</label>
                <input type="file" class="form-control " name="postImage" id="postImage" >
            </div>
            <button type="submit" class="btn btn-danger">Submit</button>
        </form>
        </div>
    </div>
    <!-- Optional JavaScript; choose one of the two -->
    <!-- Option 1: jQuery and Popper.js -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
