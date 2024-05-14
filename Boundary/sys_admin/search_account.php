<?php // Start the session
session_start(); 
include 'header.php';?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Search Account</title>
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
<style>
    /* General styles */
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

<div class="container">
    <h2 class="title">What kind of user account are you looking for?</h2>
    <div class="button-container">
        <button onclick="window.location.href='search_ra_account.php'">Real Estate Agent Account</button>
        <button onclick="window.location.href='search_user_account.php'">User Account</button>
    </div>
</div>

</body>
</html>
