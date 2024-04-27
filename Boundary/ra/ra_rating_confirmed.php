<?php
session_start();

// Check if the user_id is set in the session
if (!isset($_SESSION['user_id'])) {
    // Redirect to the seller login page if not logged in
    header("Location: ../../Boundary/seller/seller_login_boundary.php");
    exit();
}

// Get the user_id from the session
$user_id = $_SESSION['user_id'];

// Check if the ra_id is set in the session
if (!isset($_SESSION['ra_id'])) {
    // Redirect to the ra_search page if ra_id is not set
    header("Location: ra_search.php");
    exit();
}

// Get the ra_id from the session
$ra_id = $_SESSION['ra_id'];

// Display user_id and ra_id on the website (remove later)
echo "User ID: $user_id (remove later)<br>";
echo "RA ID: $ra_id (remove later)";

// Clear the session variables
unset($_SESSION['ra_id']);

// Display a confirmation message
echo "<h1>Rating Submitted</h1>";
echo "<p>Thank you for submitting your rating!</p>";
echo "<a href='ra_search.php'>Return to Agent Search</a>";
?>

