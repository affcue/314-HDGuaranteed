<?php
require_once('../../Entity/ra.php');
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
    $description = sanitizeData($_POST['description']);

    // Create RA object
    $ra = new RA($conn);

    // Call createRA() function
    if ($ra->createRA($email, $username, $password, $name, $contact, $description)) {
        // Redirect to success page with account type
        header("Location: ../../Boundary/sys_admin/create_ra_account_success.php");
        exit();
    } else {
        // Redirect back to create_ra_account.php with error message
        header("Location: ../../Boundary/sys_admin/create_ra_account.php?message=error");
        exit();
    }
}
?>
