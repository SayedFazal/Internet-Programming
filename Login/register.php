<?php
include 'db.php';
$message = '';
$showSuccess = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = $_POST['username'];
  $password = $_POST['password'];

  $plain_password = $password; 
  $check = $conn->prepare("SELECT * FROM users WHERE username=?");
  $check->bind_param("s", $username);
  $check->execute();
  $result = $check->get_result();

  if ($result->num_rows > 0) {
    $message = "Username already taken.";
  } else {
    $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
    $stmt->bind_param("ss", $username, $plain_password);
    if ($stmt->execute()) {
      $showSuccess = true;  
    } else {
      $message = "Error during registration.";
    }
    $stmt->close();
  }
  $check->close();
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Register</title>
  <?php if ($showSuccess): ?>
  <meta http-equiv="refresh" content="3;url=login.php" />
  <?php endif; ?>
</head>
<body>
  <h2>Register</h2>

  <?php if ($showSuccess): ?>
    <div style="padding:10px; background: #d4edda; color: #155724; border: 1px solid #c3e6cb; margin-bottom: 15px;">
      Registration successful! Redirecting to login page...
    </div>
  <?php elseif ($message): ?>
    <p style="color:red;"><?php echo $message; ?></p>
  <?php endif; ?>

  <?php if (!$showSuccess): ?>
  <form method="POST" action="">
    Username:<br>
    <input type="text" name="username" required><br><br>
    Password:<br>
    <input type="password" name="password" required><br><br>
    <input type="submit" value="Register">
  </form>
  <p>Already registered? <a href="login.php">Login here</a></p>
  <?php endif; ?>
</body>
</html>
