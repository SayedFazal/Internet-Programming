<?php
// Database connection
$host = 'localhost';
$db = 'login_demo';
$user = 'root';  // Change as needed
$pass = '';      // Change as needed

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
  die('Connection failed: ' . $conn->connect_error);
}

// Get and sanitize form inputs
$username = $conn->real_escape_string($_POST['username'] ?? '');
$password = $conn->real_escape_string($_POST['password'] ?? '');

// Check user
$sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  echo "success";
} else {
  echo "Invalid username or password.";
}

$conn->close();
?>
