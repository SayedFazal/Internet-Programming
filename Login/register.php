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

// Get user input
$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';

// Sanitize inputs
$username = $conn->real_escape_string($username);
$password = $conn->real_escape_string($password); // Stored as plain text as requested

// Check for existing user
$check = $conn->query("SELECT * FROM users WHERE username = '$username'");
if ($check->num_rows > 0) {
  echo "Username already exists.";
  $conn->close();
  exit;
}

// Insert new user
$sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
if ($conn->query($sql) === TRUE) {
  echo "success";
} else {
  echo "Error: " . $conn->error;
}

$conn->close();
?>
