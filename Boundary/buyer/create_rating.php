<?php
session_start();
include "header.php";
include "../../Control/buyer/create_rating_controller.php";

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: buyer_login_boundary.php");
    exit();
}

$user_id = $_SESSION['user_id'];

// Retrieve RA ID from URL
if (isset($_GET['ra_id'])) {
    $ra_id = $_GET['ra_id'];
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $stars = $_POST['stars'];
    $description = $_POST['description'];

    // Create rating
    $createRatingController->createRating($user_id, $ra_id, $stars, $description);
    // Redirect to view_ratings.php
    header("Location: view_ra.php?ra_id=$ra_id&success=true");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Create Rating</title>
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
<style>
    body {
        font-family: 'Roboto', sans-serif;
        background-color: #f2f2f2;
        margin: 0;
        padding: 0;
    }

    .container {
        max-width: 800px;
        margin: 0 auto;
        padding: 20px;
    }

    .title {
        margin-left: 20px;
    }

    form {
        margin-top: 20px;
    }

    label {
        display: block;
        margin-bottom: 10px;
    }

    input[type="text"], input[type="number"], select {
        width: 100%;
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 5px;
        box-sizing: border-box;
        margin-bottom: 10px;
    }

    input[type="submit"] {
        background-color: #007bff;
        color: #fff;
        border: none;
        border-radius: 5px;
        padding: 10px 20px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    input[type="submit"]:hover {
        background-color: #0056b3;
    }
</style>
</head>
<body>

<div class="container">
    <h2 class="title">Create Rating</h2>
    <form method="post" action="">
        <label for="stars">Stars:</label>
        <input type="number" name="stars" id="stars" min="1" max="5" required><br>
        <label for="description">Description:</label><br>
        <textarea name="description" id="description" cols="30" rows="5"></textarea><br>
        <button type="submit">Submit Rating</button>
    </form>
</div>

</body>
</html>
