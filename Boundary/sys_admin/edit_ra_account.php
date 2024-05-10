<?php
include "header.php";
include "../../Control/sys_admin/edit_ra_account_controller.php";

// Check if an RA ID is provided in the URL
if(isset($_GET['ra_id'])) {
    // Retrieve the RA details using the provided RA ID
    $ra_id = $_GET['ra_id'];
    $ra = $editRAAccountController->getRAByRAID($ra_id);
    
    // Check if the RA exists
    if($ra) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit RA Account</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        .container {
            margin-left: 20px; /* Adjust the value as needed */
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="title">Edit RA Account</h2>
        <form action="../../Control/sys_admin/edit_ra_account_controller.php" method="post">
            <input type="hidden" name="ra_id" value="<?php echo $ra['ra_id']; ?>">
            <label for="username">Username:</label><br>
            <input type="text" id="username" name="username" value="<?php echo $ra['username']; ?>"><br>
            <label for="password">Password:</label><br>
            <input type="password" id="password" name="password" value="<?php echo $ra['password']; ?>"><br><br>
            <input type="submit" value="Save Changes">
        </form>
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
