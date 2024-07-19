<?php
session_start();

if (!isset($_SESSION['admin_id'])) {
    // Admin is not logged in, redirect to login page
    header("Location: login.php");
    exit();
}
include('connection.php');
include('header.php');

// Query to select all posts from the database
$query = mysqli_query($conn, "SELECT * FROM posts ORDER BY id DESC");

// Check if there are any posts
$result = mysqli_num_rows($query);
$i = 1;
?>

<div class="container">
    <div class="row">
        <div class="col-md-10">
            <h1 class="text-center " style="margin-top:4em;">Manage Posts</h1>
            <?php
if (isset($_SESSION['message'])) {
    echo "<div id='autoCloseAlert' class='alert alert-" . $_SESSION['message_type'] . " alert-dismissible fade show' role='alert'>
            " . $_SESSION['message'] . "
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
          </div>";
    unset($_SESSION['message']);
    unset($_SESSION['message_type']);
    
    echo "<script>
            setTimeout(function() {
                var alert = document.getElementById('autoCloseAlert');
                var bsAlert = new bootstrap.Alert(alert);
                bsAlert.close();
            }, 5000);
          </script>";
}
?>        <a href="create_post.php" class="btn btn-primary float-end mb-3">Add Post</a>
            <table class="table table-dark " style="border-radius: 2em;">
                <thead class="p-5">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Description</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody class="p-5">
                    <?php
                    if ($result > 0) {
                        while ($row = mysqli_fetch_assoc($query)) {
                            echo "<tr class='p-3'>";
                            echo "<td>" . $i++ . "</td>";
                            echo "<td>" . htmlspecialchars($row['post_title']) . "</td>";
                            $description = strlen($row['post_description']) > 100 ? substr($row['post_description'], 0, 100) . '...' : $row['post_description'];
                            echo "<td>" . htmlspecialchars($description) . "</td>";
                            echo "<td>
                                   <button type='button' class='btn btn-primary btn-sm' data-bs-toggle='modal' data-bs-target='#editModal" . $row['id'] . "'>Edit</button>
                                    <a href='delete_post.php?id=" . $row['id'] . "' class='btn btn-danger btn-sm'>Delete</a>
                                  </td>";
                            echo "</tr>";
                    ?>
                            <!-- Modal for editing post -->
                            <div class='modal fade' id='editModal<?php echo $row['id']; ?>' tabindex='-1' aria-labelledby='editModalLabel<?php echo $row['id']; ?>' aria-hidden='true'>
                                <div class='modal-dialog'>
                                    <div class='modal-content'>
                                        <div class='modal-header'>
                                            <h5 class='modal-title text-dark' id='editModalLabel<?php echo $row['id']; ?>'>Edit Post</h5>
                                            <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                                        </div>
                                        <div class='modal-body'>
                                            <form action='update_post.php' method='POST'>
                                                <input type='hidden' name='post_id' value='<?php echo $row['id']; ?>'>
                                                <div class='mb-3'>
                                                    <label for='post_title' class='form-label  text-dark'>Title</label>
                                                    <input type='text' class='form-control' id='post_title' name='post_title' value='<?php echo htmlspecialchars($row['post_title']); ?>'>
                                                </div>
                                                <div class='mb-3'>
                                                    <label for='post_description' class='form-label text-dark'>Description</label>
                                                    <textarea class='form-control' id='post_description' name='post_description' rows='5'><?php echo htmlspecialchars($row['post_description']); ?></textarea>
                                                </div>
                                                <button type='submit' class='btn btn-primary'>Save changes</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    <?php
                        }
                    } else {
                        echo "<tr><td colspan='4'>No posts found.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
