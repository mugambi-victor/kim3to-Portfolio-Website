<?php
include('connection.php');

// Set header for JSON content
header('Content-Type: application/json');
// Allow from any origin
header('Access-Control-Allow-Origin: *');
// Allow methods GET, POST, PUT, DELETE, OPTIONS
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
// Allow headers Content-Type, Authorization, Accept
header('Access-Control-Allow-Headers: Content-Type, Authorization, Accept');

if (isset($_GET['id'])) {
    $postId = intval($_GET['id']);
    $query = mysqli_query($conn, "SELECT * FROM posts WHERE id = $postId");

    if ($query) {
        $post = mysqli_fetch_assoc($query);
        if ($post) {
            echo json_encode($post); // Output JSON representation of the post data
        } else {
            http_response_code(404);
            echo json_encode(['error' => 'Post not found']);
        }
    } else {
        http_response_code(500);
        echo json_encode(['error' => 'Query failed']);
    }
} else {
    http_response_code(400);
    echo json_encode(['error' => 'Invalid ID']);
}
?>
