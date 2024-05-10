<?php
require_once('../../Entity/admin.php');
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

    // Create Admin object
    $admin = new Admin($conn);

    // Call createAdmin() function
    if ($admin->createAdmin($email, $username, $password, $name, $contact)) {
        // Redirect to success page
        header("Location: ../../Boundary/sys_admin/create_admin_account_success.php");
        exit();
    } else {
        // Redirect back to create_admin_account.php with error message
        header("Location: ../../Boundary/sys_admin/create_admin_account.php?message=error");
        exit();
    }
}
?>
