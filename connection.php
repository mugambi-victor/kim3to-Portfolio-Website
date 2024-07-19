<?php
$dbhost = "localhost";
$username = "root";
$password = "ZAVf6VHG";
$dbname = "kimeto_blog";
// $socket = "/opt/lampp/var/mysql/mysql.sock"; 

// Create connection
$conn = mysqli_connect($dbhost, $username, $password, $dbname, );

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
