<?php
// Set a cookie
setcookie("user", "John", time() + 3600, "/"); // Original value
// Modify the cookie
if (isset($_COOKIE['user'])) {
    setcookie("user", "Jane", time() + 3600, "/"); // Updated value
    echo "Cookie value changed to: Jane";
} else {
    echo "Cookie not set yet. Refresh the page to see the change.";
}
?>
