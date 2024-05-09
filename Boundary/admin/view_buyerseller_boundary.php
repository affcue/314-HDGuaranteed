<?php
include ("../ra/header.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View User</title>
</head>

<body>
    <h1>User Details</h1>
    <?php
    // Include the controller to fetch admin details
    require_once("../../Control/admin/view_buyerseller_controller.php");

    // Get admin details
    $userDetails = getBuyerSellerDetails($_GET['user_id']);

    if ($userDetails) {
        echo "<p>User ID: {$userDetails['user_id']}</p>";
        echo "<p>E-mail: {$userDetails['e-mail']}</p>";
        echo "<p>Username: {$userDetails['username']}</p>";
        echo "<p>Password: {$userDetails['password']}</p>";
        echo "<p>Name: {$userDetails['name']}</p>";
        echo "<p>Contact: {$userDetails['contact']}</p>";
        echo "<p>Purpose: {$userDetails['purpose']}</p>";
    } else {
        echo "User not found!";
    }
    ?>
</body>

</html>
