<?php
include "header.php";
include "../../Control/ra/view_ra_controller.php";

// Check if an RA ID is provided in the URL
if(isset($_GET['ra_id'])) {
    // Retrieve the RA details using the provided RA ID
    $ra_id = $_GET['ra_id'];
    $ra = $viewRAController->getRAByRAID($ra_id);
    
    // Check if the RA exists
    if($ra) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View RA</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        .container {
        margin-left: 20px; /* Adjust the value as needed */
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="title">RA Details</h2>
        <div class="ra-details">
            <p><strong>RA ID:</strong> <?php echo $ra['ra_id']; ?></p>
            <p><strong>Email:</strong> <?php echo $ra['e-mail']; ?></p>
            <p><strong>Username:</strong> <?php echo $ra['username']; ?></p>
            <p><strong>Name:</strong> <?php echo $ra['name']; ?></p>
            <p><strong>Contact:</strong> <?php echo $ra['contact']; ?></p>
            <p><strong>Description:</strong> <?php echo $ra['description']; ?></p>
        </div>
    </div>
    <?php include 'view_rating.php'?>
</body>
</html>
<?php
    } else {
        echo "<p>RA not found.</p>";
    }
}
?>
