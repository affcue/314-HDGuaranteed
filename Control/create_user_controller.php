<?php
require_once('../../Entity/user.php');
require_once('../../Database/db_conn.php'); // Include db_conn.php file for database connection

// Function to sanitize input data
function sanitizeData($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize user input
    $email = sanitizeData($_POST['email']);
    $username = sanitizeData($_POST['username']);
    $password = sanitizeData($_POST['password']);
    $name = sanitizeData($_POST['name']);
    $contact = sanitizeData($_POST['contact']);
    $purpose = sanitizeData($_POST['purpose']);

    // Create User object
    $user = new User($conn);

    // Call createUser() function
    if ($user->createUser($email, $username, $password, $name, $contact, $purpose)) {
        // Redirect back to create_account.php with success message
        header("Location: ../../Boundary/user_landing_page.php?message=success");
        exit();
    } else {
        // Redirect back to create_account.php with error message
        header("Location: ../../Boundary/user_landing_page.php?message=error");
        exit();
    }
}
?>
