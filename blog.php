<?php
include('header.php');
include('connection.php');
?>
<div class="container" style="margin-top: 5rem;">
    <div class="row">
        <div class="col-md-8 mt-4" id="main-post" style="height: 100vh; overflow-y: auto;  position: relative;">
            <div style="position: sticky; top: 0; background-color:#000; z-index: 1; padding-top: .5rem; padding-bottom:.5rem">
                <?php
                $latest_post_query = mysqli_query($conn, "SELECT * FROM posts ORDER BY id DESC LIMIT 1");
                $latest_post = mysqli_fetch_assoc($latest_post_query);
                ?>
                <h2 class="fw-bold" id="main-post-title"><?php echo htmlspecialchars($latest_post['post_title']); ?></h2>
            </div>
            <img id="main-post-image" src="<?php echo htmlspecialchars($latest_post['post_image']); ?>" class="img-fluid" style="width:100%; height:400px; border-radius:.5rem" alt="">
            <p id="main-post-description" class="pt-3">
    <?php echo nl2br(htmlspecialchars($latest_post['post_description'])); ?>
</p>

        </div>
        <div class="col-md-4 mt-4" style="height: 90vh; overflow-y: auto;">
            <h2 class="fw-bold">Explore Blogs</h2>
            <?php
            $query = mysqli_query($conn, "SELECT * FROM posts order by id desc");
            $result = mysqli_num_rows($query);

            if ($result > 0) {
                while ($row = mysqli_fetch_array($query)) {
                    $postId = $row['id'];
                    $postTitle = $row['post_title'];
                    $postDescription = $row['post_description'];
                    $postImage = $row['post_image'];
            ?>
                    <div class="card mb-3 post-card bg-dark text-white" data-id="<?php echo $postId; ?>" style="height:250px; cursor:pointer;">
                        <div class="row g-0">
                            <div class="col-md">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo htmlspecialchars($postTitle); ?></h5>
                                    <img src="<?php echo $postImage ?>" style="height: 100px;" alt="">
                                    <p class="card-text pt-2">
                                        <?php
                                        // Truncate postDescription to 200 characters
                                        $truncatedDescription = (strlen($postDescription) > 100) ? substr($postDescription, 0, 100) . '...' : $postDescription;
                                        echo htmlspecialchars($truncatedDescription); // Use htmlspecialchars to prevent XSS attacks
                                        ?>
                                        <a class=" view-post-button text-danger " data-id="<?php echo $postId; ?>">Read More</a>
                                    </p>
                                    <p class="card-text d-flex justify-content-between align-items-center"><small class="text-muted">Last updated 3 mins ago</small>  </p>
                                   
                                </div>
                            </div>
                        </div>
                    </div>
            <?php
                }
            } else {
                echo "No posts found.";
            }
            ?>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script>
   $(document).ready(function() {
    $('.view-post-button').click(function(event) {
        event.stopPropagation();

        var postId = $(this).data('id');

        $.ajax({
            url: 'get_post.php',
            type: 'GET',
            data: { id: postId },
             dataType: 'text',
            
            success: function(response) {
                var jsonResponse = JSON.parse(response);
    try {
        $('#main-post-title').text(jsonResponse.post_title);
        $('#main-post-image').attr('src', jsonResponse.post_image);
        $('#main-post-description').text(jsonResponse.post_description);
    } catch (e) {
        console.error("Parsing error:", e);
    }
},

            error: function(xhr, status, error) {
                console.error("AJAX error:", status, error);
            }
        });
    });
});

</script>