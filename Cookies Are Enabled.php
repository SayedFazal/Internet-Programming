<?php
// Set a test cookie
setcookie("test_cookie", "test", time() + 3600, "/");

if (count($_COOKIE) > 0 && isset($_COOKIE['test_cookie'])) {
    echo "✅ Cookies are enabled.";
} else {
    echo "❌ Cookies are disabled or not supported.";
}
?>
