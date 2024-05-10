<?php
include "header.php";
include "../../Control/sys_admin/edit_admin_account_controller.php";

// Check if an Admin ID is provided in the URL
if(isset($_GET['admin_id'])) {
    // Retrieve the Admin details using the provided Admin ID
    $admin_id = $_GET['admin_id'];
    $admin = $editAdminAccountController->getAdminByAdminID($admin_id);
    
    // Check if the Admin exists
    if($admin) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Admin Account</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        .container {
            margin-left: 20px; /* Adjust the value as needed */
        }
        
    </style>
</head>
<body>
    <div class="container">
        <h2 class="title">Edit Admin Account</h2>
        <form action="../../Control/sys_admin/edit_admin_account_controller.php" method="post">
            <input type="hidden" name="admin_id" value="<?php echo $admin['admin_id']; ?>">
            <label for="username">Username:</label><br>
            <input type="text" id="username" name="username" value="<?php echo $admin['username']; ?>"><br>
            <label for="password">Password:</label><br>
            <input type="password" id="password" name="password" value="<?php echo $admin['password']; ?>"><br><br>
            <input type="submit" value="Save Changes">
        </form>
    </div>
</body>
</html>
<?php
    } else {
        echo "<p>Admin account not found.</p>";
    }
} else {
    echo "<p>Admin ID not provided.</p>";
}
?>
