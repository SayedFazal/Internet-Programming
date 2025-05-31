<?php
include 'db.php';
session_start();
$message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = $_POST['username'];
  $password = $_POST['password'];

  $stmt = $conn->prepare("SELECT id, password FROM users WHERE username=?");
  $stmt->bind_param("s", $username);
  $stmt->execute();
  $stmt->store_result();

  if ($stmt->num_rows == 1) {
    $stmt->bind_result($id, $stored_password);
    $stmt->fetch();

    
    if ($password === $stored_password) {
      $_SESSION['user_id'] = $id;
      $_SESSION['username'] = $username;
      header("Location: welcome.php");
      exit();
    } else {
      $message = "Wrong password.";
    }
  } else {
    $message = "User not found.";
  }
  $stmt->close();
}
?>

<!DOCTYPE html>
<html>
<head><title>Login</title></head>
<body>
  <h2>Login</h2>
  <?php if ($message) echo "<p>$message</p>"; ?>
  <form method="POST" action="">
    Username:<br>
    <input type="text" name="username" required><br><br>
    Password:<br>
    <input type="password" name="password" required><br><br>
    <input type="submit" value="Login">
  </form>
  <p>New user? <a href="register.php">Register here</a></p>
</body>
</html>
