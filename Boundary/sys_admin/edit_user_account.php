<?php
include "header.php";
include "../../Control/sys_admin/edit_user_account_controller.php";

$editUserAccountController = new EditUserAccountController($conn);

// Check if a user ID is provided in the URL
if(isset($_GET['user_id'])) {
    // Retrieve the user details using the provided user ID
    $user_id = $_GET['user_id'];
    $user = $editUserAccountController->getUserByID($user_id);
    
    // Check if the user exists
    if($user) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User Account</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        .container {
            margin-left: 20px; /* Adjust the value as needed */
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="title">Edit User Account</h2>
        <form action="../../Control/sys_admin/edit_user_account_controller.php" method="post">
            <input type="hidden" name="user_id" value="<?php echo $user['user_id']; ?>">
            <label for="username">Username:</label><br>
            <input type="text" id="username" name="username" value="<?php echo $user['username']; ?>"><br>
            <label for="password">Password:</label><br>
            <input type="password" id="password" name="password" value="<?php echo $user['password']; ?>"><br><br>
            <input type="submit" name="submit" value="Save Changes">
        </form>
    </div>
</body>
</html>
<?php
    } else {
        echo "<p>User account not found.</p>";
    }
} else {
    echo "<p>User ID not provided.</p>";
}
?>
