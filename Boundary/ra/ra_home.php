<?php
    // Start the session
session_start();

// Check if ra_id is set in session
if(isset($_SESSION['ra_id'])) {
    $ra_id = $_SESSION['ra_id'];
    // Now you can use $ra_id as needed
} else {
    // Redirect user to login page if not logged in
    header("Location: ../../Boundary/ra/ra_login.php");
    exit;}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>RA Home</title>
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
<style>
    body {
        font-family: 'Roboto', sans-serif;
        background-color: #f2f2f2;
        margin: 0;
        padding: 0;
    }

    .buttons {
        display: flex;
        gap: 10px;
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
</style>
</head>
<body>
<?php include 'header.php'?>

<div class="container">
    <h2 class="title">Welcome to your RA Home</h2>
    <div class="button-container">
        <button onclick="window.location.href='Edit_ProfileB.php'">Edit RA Profile</button>
        <button onclick="window.location.href='My_ListingsB.php'">My Listings</button>
    </div>
</div>

</body>
</html>
