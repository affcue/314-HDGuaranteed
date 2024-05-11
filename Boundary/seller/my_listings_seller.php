<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: ../seller_login_boundary.php"); // Redirect if user is not logged in
    exit();
}

require_once('../../Database/db_conn.php');
require_once('../../Control/seller/my_listings_seller_controller.php');

$myListingsController = new MyListingsController($conn);
$user_id = $_SESSION['user_id'];
$listings = $myListingsController->getAllListingsByUserID($user_id);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>My Listings</title>
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
<style>
    body {
        font-family: 'Roboto', sans-serif;
        background-color: #f2f2f2;
        margin: 0;
        padding: 0;
    }

    .container {
        max-width: 800px;
        margin: 0 auto;
        padding: 20px;
    }

    .title {
        margin-left: 20px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    th, td {
        padding: 8px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    th {
        background-color: #f2f2f2;
    }
</style>
</head>
<body>
<?php include 'header.php'?>

<div class="container">
    <h2 class="title">My Listings</h2>
    <div class="listings">
        <table>
            <thead>
                <tr>
                    <th>Location</th>
                    <th>Type</th>
                    <th>Price</th>
                    <th>Size</th>
                    <th>Rooms</th>
                    <th>Views</th>
                    <th>Currently Shortlisted</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($listings as $listing): ?>
                    <tr>
                        <td><?php echo $listing['location']; ?></td>
                        <td><?php echo $listing['type']; ?></td>
                        <td><?php echo $listing['price']; ?></td>
                        <td><?php echo $listing['size']; ?></td>
                        <td><?php echo $listing['rooms']; ?></td>
                        <td><?php echo $listing['views']; ?></td>
                        <td><?php echo $listing['shortlists']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

</body>
</html>
