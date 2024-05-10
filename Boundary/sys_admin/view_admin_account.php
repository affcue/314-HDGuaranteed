<?php
include "header.php";
include "../../Control/sys_admin/view_admin_account_controller.php";

// Check if an admin ID is provided in the URL
if (isset($_GET['admin_id'])) {
    // Retrieve the admin details using the provided admin ID
    $admin_id = $_GET['admin_id'];
    $admin = $viewAdminAccountController->getAdminByAdminID($admin_id);

    // Check if the admin exists
    if ($admin) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Admin Account</title>
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
        <h2 class="title">Admin Account Details</h2>
        <div class="admin-details">
            <p><strong>Username:</strong> <?php echo $admin['username']; ?></p>
            <p><strong>Password:</strong> <?php echo $admin['password']; ?></p>
        </div>
        <div class="button-container">
            <a href="edit_admin_account.php?admin_id=<?php echo $admin_id; ?>" class="btn btn-primary">Edit</a>
            <form action="../../Control/sys_admin/delete_admin_account_controller.php" method="post">
                <input type="hidden" name="admin_id" value="<?php echo $admin['admin_id']; ?>">
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </div>
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
