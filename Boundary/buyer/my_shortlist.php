<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: ../user_login.php"); // Redirect if user is not logged in
    exit();
}

require_once('../../Database/db_conn.php');
require_once('../../Control/buyer/my_shortlist_controller.php');

$myShortlistController = new MyShortlistController($conn);
$user_id = $_SESSION['user_id'];
$shortlistedListings = $myShortlistController->getShortlistedListings($user_id);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>My Shortlist</title>
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

    .buttons {
        display: flex;
        gap: 5px;
    }

    .buttons button {
        background-color: #007bff; /* Set button background color */
        color: white; /* Set button text color */
        padding: 5px 10px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-family: 'Roboto', sans-serif;
    }
</style>
</head>
<body>
<?php include 'header.php'?>

<div class="container">
    <h2 class="title">My Shortlist</h2>
    <?php if (!empty($shortlistedListings)): ?>
    <div class="listings">
        <table>
            <thead>
                <tr>
                    <th>Listing ID</th>
                    <th>Region</th>
                    <th>Type</th>
                    <th>Location</th>
                    <th>Postal</th>
                    <th>Price</th>
                    <th>Rooms</th>
                    <th>Size</th>
                    <th>Views</th>
                    <th>Shortlists</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($shortlistedListings as $listing): ?>
                <tr>
                    <td><?php echo $listing['listing_id']; ?></td>
                    <td><?php echo $listing['region']; ?></td>
                    <td><?php echo $listing['type']; ?></td>
                    <td><?php echo $listing['location']; ?></td>
                    <td><?php echo $listing['postal']; ?></td>
                    <td><?php echo $listing['price']; ?></td>
                    <td><?php echo $listing['rooms']; ?></td>
                    <td><?php echo $listing['size']; ?></td>
                    <td><?php echo $listing['views']; ?></td>
                    <td><?php echo $listing['shortlists']; ?></td>
                    <td>
                        <div class="buttons">
                        <form action="../../Control/buyer/delete_shortlist_controller.php" method="post">
                            <input type="hidden" name="listing_id" value="<?php echo $listing['listing_id']; ?>">
                            <button type="submit">Delete</button>
                        </form>
                        <form action="../../Boundary/buyer/view_listing.php" method="get">
                            <input type="hidden" name="listing_id" value="<?php echo $listing['listing_id']; ?>">
                            <button type="submit">View</button>
                        </form>

                        </div>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <?php else: ?>
    <p>No listings found in your shortlist.</p>
    <?php endif; ?>
</div>

</body>
</html>
