<?php
session_start();

require_once('../../Control/seller/logout_controller.php');

$logoutController = new LogoutController();
$logoutController->logout();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logout</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
        }
        .message {
            text-align: center;
            margin-top: 50px;
        }
        .login-button {
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            font-size: 16px;
            margin-top: 20px;
            transition: background-color 0.3s ease;
        }
        .login-button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="message">
        <h1>You have been logged out successfully!</h1>
        <p>Click the button below to log in again.</p>
        <a href="buyer_login_boundary.php" class="login-button">Log In</a>
    </div>
</body>
</html>
