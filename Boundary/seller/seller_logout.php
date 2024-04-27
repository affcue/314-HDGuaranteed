<?php
// Start the session
session_start();

// Unset all session variables
$_SESSION = array();

// Destroy the session
session_destroy();

// Redirect to the seller login page
header("Location: ../../Boundary/seller/seller_login_boundary.php");
exit();
?>
