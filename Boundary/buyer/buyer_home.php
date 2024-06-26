<?php
session_start(); // Start the session

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    // Redirect to login page if not logged in
    header("Location: ../../Boundary/buyer/buyer_login_boundary.php");
    exit();
}

if (!isset($_SESSION['username'])) {
    // Redirect to login page if not logged in
    header("Location: ../../Boundary/buyer/buyer_login_boundary.php");
    exit();
}

// Retrieve user_id from session
$user_id = $_SESSION['user_id'];
$username = $_SESSION['username'];

// Now you can use $user_id to perform actions or fetch data specific to the logged-in user
?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Buyer Home</title>
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
<style>
    body {
        font-family: 'Roboto', sans-serif;
        background-color: #f2f2f2;
        margin: 0;
        padding: 0;
    }

    .container {
        background-color: #fff;
        padding: 20px;
        margin: 20px;
        border-radius: 5px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .title {
        margin-top: 0;
    }

    .button-container {
        display: flex;
        gap: 10px;
        margin-bottom: 20px; /* Space between button sets */
    }

    .button-container button {
        padding: 10px 20px;
        border: none;
        background-color: #007bff;
        color: #fff;
        border-radius: 5px;
        cursor: pointer;
        font-size: 16px;
        font-weight: 500;
        transition: background-color 0.3s ease;
    }

    .button-container button:hover {
        background-color: #0056b3;
    }

    .small-button {
        padding: 8px 16px; /* Slightly smaller than other buttons */
        font-size: 14px; /* Smaller font size */
    }
</style>
</head>
<body>
<?php include("../buyer/header.php"); ?>


<div class="container">
<h2 class="title">Welcome to your Home, <?php echo htmlspecialchars($username); ?></h2>
    <div class="button-container">
        <button onclick="window.location.href='my_shortlist.php'">My Shortlisted Listings</button>
    </div>
</div>

</body>
</html>
