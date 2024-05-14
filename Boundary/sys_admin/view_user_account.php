<?php
include "header.php";
include "../../Control/sys_admin/view_user_account_controller.php";

// Check if a user ID is provided in the URL
if(isset($_GET['user_id'])) {
    // Retrieve the user details using the provided user ID
    $user_id = $_GET['user_id'];
    $user = $viewUserAccountController->getUserByID($user_id);
    
    // Check if the user exists
    if($user) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View User Account</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        .container {
            margin-left: 20px; /* Adjust the value as needed */
        }
        
        .btn {
            background-color: #007bff;
            color: white;
            padding: 8px 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-family: 'Roboto', sans-serif;
        }

        .btn.btn-danger {
            background-color: #dc3545;
            color: white;
            padding: 8px 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-family: 'Roboto', sans-serif;
        }

        .button-container {
            display: flex;
            gap: 10px; /* Add space between buttons */
            margin-top: 10px; /* Add margin to separate from the RA details */
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="title">User Account Details</h2>
        <div class="user-details">
            <p><strong>Username:</strong> <?php echo $user['username']; ?></p>
            <p><strong>Password:</strong> <?php echo $user['password']; ?></p>
            <p><strong>Email:</strong> <?php echo $user['e-mail']; ?></p>
            <p><strong>Name:</strong> <?php echo $user['name']; ?></p>
            <p><strong>Contact:</strong> <?php echo $user['contact']; ?></p>
            <p><strong>Purpose:</strong> <?php echo $user['purpose']; ?></p>
            <!-- Add more user details here -->
        </div>
        <div class="button-container">
            <a href="edit_user_account.php?user_id=<?php echo $user_id; ?>" class="btn btn-primary">Edit Account</a>
            <a href="edit_user_profile.php?user_id=<?php echo $user_id; ?>" class="btn btn-primary">Edit Profile</a>
            <a href="../../Control/sys_admin/update_to_ra_controller.php?user_id=<?php echo $user_id; ?>" class="btn btn-primary">Change to RA Account</a> 
            <form action="../../Control/sys_admin/delete_user_account_controller.php" method="post">
                <input type="hidden" name="user_id" value="<?php echo $user['user_id']; ?>">
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </div>
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
