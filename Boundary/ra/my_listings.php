<?php
session_start();
if (!isset($_SESSION['ra_id'])) {
    header("Location: ra_login.php");
    exit();
}

require_once('../../Database/db_conn.php');
require_once('../../Control/ra/my_listings_controller.php');

$myListingsController = new MyListingsController($conn);
$ra_id = $_SESSION['ra_id'];
$listings = $myListingsController->getAllListingsByRAID($ra_id);
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

    .create-listing {
        padding: 8px 16px;
        border: none;
        background-color: #007bff;
        color: #fff;
        border-radius: 5px;
        cursor: pointer;
        font-size: 16px;
        font-weight: 500;
        transition: background-color 0.3s ease;
        margin-bottom: 10px;
    }

    .create-listing:hover {
        background-color: #0056b3;
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

    .action-buttons button {
        padding: 8px 16px;
        border: none;
        background-color: #007bff;
        color: #fff;
        border-radius: 5px;
        cursor: pointer;
        font-size: 16px;
        font-weight: 500;
        transition: background-color 0.3s ease;
        margin-right: 5px;
        margin-bottom: 5px; /* Added margin bottom for vertical spacing */
    }

    .action-buttons button:hover {
        background-color: #0056b3;
    }
</style>
</head>
<body>
<?php include 'header.php'?>

<div class="container">
    <h2 class="title">My Listings</h2>
    <button class="create-listing" onclick="window.location.href='create_listing.php'">Create New Listing</button>
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
                    <th>Action</th>
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
                        <td class="action-buttons">
                            <button onclick="window.location.href='edit_listing.php?listing_id=<?php echo $listing['listing_id']; ?>'">Edit</button>
                            <button onclick="window.location.href='../../Control/ra/delete_listing_controller.php?listing_id=<?php echo $listing['listing_id']; ?>'">Delete</button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

</body>
</html>
