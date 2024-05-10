<?php
include "header.php";
include "../../Control/sys_admin/view_ra_account_controller.php";

// Check if an RA ID is provided in the URL
if(isset($_GET['ra_id'])) {
    // Retrieve the RA details using the provided RA ID
    $ra_id = $_GET['ra_id'];
    $ra = $viewRAAccountController->getRAByRAID($ra_id);
    
    // Check if the RA exists
    if($ra) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View RA Account</title>
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
        <h2 class="title">RA Account Details</h2>
        <div class="ra-details">
            <p><strong>Username:</strong> <?php echo $ra['username']; ?></p>
            <p><strong>Password:</strong> <?php echo $ra['password']; ?></p>
        </div>
        <div class="button-container">
         <a href="edit_ra_account.php?ra_id=<?php echo $ra_id; ?>" class="btn btn-primary">Edit</a>
         <form action="../../Control/sys_admin/delete_ra_account_controller.php" method="post">
        <input type="hidden" name="ra_id" value="<?php echo $ra['ra_id']; ?>">
        <button type="submit" class="btn btn-danger">Delete</button>
    </form>
</div>

    </div>
</body>
</html>
<?php
    } else {
        echo "<p>RA account not found.</p>";
    }
} else {
    echo "<p>RA ID not provided.</p>";
}
?>
