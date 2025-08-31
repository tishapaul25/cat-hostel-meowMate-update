<?php
// Start session
session_start();

// Destroy all session data
session_unset();
session_destroy();

// Clear the user_id cookie (make sure the path matches the cookie you set)
setcookie('user_id', '', time() - 3600, "/");

// Redirect to homepage
header("Location: index.php");
exit();
