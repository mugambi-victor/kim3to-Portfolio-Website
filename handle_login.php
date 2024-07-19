<?php
// Start a session
session_start();

// Include the database connection file
include('connection.php');

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form inputs
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // Prepare the SQL query to select the admin by email
    $query = "SELECT * FROM admins WHERE email = '$email'";
    $result = mysqli_query($conn, $query);

    // Check if the admin exists
    if (mysqli_num_rows($result) == 1) {
        // Fetch the admin data
        $admin = mysqli_fetch_assoc($result);

        // Verify the password (plain text comparison, not recommended)
        if ($password === $admin['password']) {
            // Password is correct, set the session variables
            $_SESSION['admin_id'] = $admin['id'];
            $_SESSION['admin_email'] = $admin['email'];

            // Redirect to the admin dashboard or any other page
            header("Location: manage_posts.php");
            exit();
        } else {
            // Password is incorrect
            echo "Invalid password.";
        }
    } else {
        // Admin not found
        echo "No account found with that email.";
    }
}

// Close the database connection
mysqli_close($conn);
?>
