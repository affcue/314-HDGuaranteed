<?php
// Edit_ProfileC.php

require 'Edit_ProfileE.php';  // Adjust the path as needed

session_start();
$pdo = new PDO("mysql:host=localhost;dbname=314hdguaranteed", "root", "");
$userProfile = new UserProfile($pdo);

// Prepare CSRF token for the form
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!isset($_POST['csrf_token']) || !hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'])) {
        die('CSRF token validation failed');
    }

    $userId = $_SESSION['user_id'];  // Assuming user ID is stored in the session

    $name = $_POST['name'];
    $description = $_POST['description'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];

    if ($userProfile->updateUserData($userId, $name, $description, $email, $contact)) {
        echo "Profile updated successfully!";
    } else {
        echo "Failed to update profile. Please check your inputs.";
    }
}
?>
