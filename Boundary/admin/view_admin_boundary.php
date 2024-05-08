<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Admin</title>
</head>

<body>
    <h1>Admin Details</h1>
    <?php
    // Include the controller to fetch admin details
    require_once("../../Control/admin/view_admin_controller.php");

    // Get admin details
    $adminDetails = getAdminDetails($_GET['admin_id']);

    if ($adminDetails) {
        echo "<p>Admin ID: {$adminDetails['admin_id']}</p>";
        echo "<p>E-mail: {$adminDetails['e-mail']}</p>";
        echo "<p>Username: {$adminDetails['username']}</p>";
        echo "<p>Password: {$adminDetails['password']}</p>";
        echo "<p>Name: {$adminDetails['name']}</p>";
        echo "<p>Contact: {$adminDetails['contact']}</p>";
    } else {
        echo "Admin not found!";
    }
    ?>
</body>

</html>
