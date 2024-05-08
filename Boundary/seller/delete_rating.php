<?php
session_start();
include "header.php";
include "../../Control/seller/delete_rating_controller.php";

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: seller_login_boundary.php");
    exit();
}

// Retrieve rating ID from URL
if (isset($_GET['rating_id'])) {
    $rating_id = $_GET['rating_id'];
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($_POST['confirm'] == 'yes') {
        // Delete rating
        $deleteRatingController->deleteRating($rating_id);
    }
    // Redirect to view_ratings.php
    header("Location: view_ratings.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Delete Rating</title>
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
<style>
    /* Styles */
</style>
</head>
<body>

<div class="container">
    <h2 class="title">Confirm Delete Rating</h2>
    <p>Are you sure you want to delete this rating?</p>
    <form method="post" action="">
        <button type="submit" name="confirm" value="yes">Yes</button>
        <button type="submit" name="confirm" value="no">No</button>
    </form>
</div>

</body>
</html>
