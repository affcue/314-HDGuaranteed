<?php
include "header.php";
include "../../Control/buyer/view_listing_controller.php";
session_start();

// Check if a listing ID is provided in the URL
if(isset($_GET['listing_id'])) {
    // Retrieve the listing details using the provided listing ID
    $listing_id = $_GET['listing_id'];
    $listing = $viewListingController->getListingByListingID($listing_id);
    
    // Check if the listing exists
    if($listing) {
        $user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;
        $isShortlisted = $viewListingController->isShortlisted($user_id, $listing_id);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Listing</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        .container {
            margin-left: 20px; /* Adjust the value as needed */
        }

        .buttons button {
            background-color: #007bff; /* Set button background color */
            color: white; /* Set button text color */
            padding: 8px 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-family: 'Roboto', sans-serif;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="title">Listing Details</h2>
        <div class="listing-details">
            <p><strong>Listing ID:</strong> <?php echo $listing['listing_id']; ?></p>
            <p><strong>RA ID:</strong> <?php echo $listing['ra_id']; ?></p>
            <p><strong>User ID:</strong> <?php echo $listing['user_id']; ?></p>
            <p><strong>Region:</strong> <?php echo $listing['region']; ?></p>
            <p><strong>Type:</strong> <?php echo $listing['type']; ?></p>
            <p><strong>Location:</strong> <?php echo $listing['location']; ?></p>
            <p><strong>Postal:</strong> <?php echo $listing['postal']; ?></p>
            <p><strong>Price:</strong> <?php echo $listing['price']; ?></p>
            <p><strong>Rooms:</strong> <?php echo $listing['rooms']; ?></p>
            <p><strong>Size:</strong> <?php echo $listing['size']; ?></p>
            <p><strong>Views:</strong> <?php echo $listing['views']; ?></p>
            <p><strong>Shortlists:</strong> <?php echo $listing['shortlists']; ?></p>
            <?php if ($user_id): ?>
                <?php if ($isShortlisted): ?>
                    <form action="../../Control/buyer/delete_shortlist_controller.php" method="post">
                        <input type="hidden" name="listing_id" value="<?php echo $listing_id; ?>">
                        <div class="buttons">
                        <button type="submit">Remove from Shortlist</button>
                        </div>
                    </form>
                    <br>
                    <div class="buttons">
                    <button onclick="window.location.href='my_shortlist.php'">My Shortlisted Listings</button>
                    </div>
                <?php else: ?>
                    <form action="../../Control/buyer/create_shortlist_controller.php" method="post">
                        <input type="hidden" name="listing_id" value="<?php echo $listing_id; ?>">
                        <div class="buttons">
                        <button type="submit">Add to Shortlist</button>
                        </div>
                    </form>
                <?php endif; ?>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>
<?php
    } else {
        echo "<p>Listing not found.</p>";
    }
} else {
    echo "<p>Listing ID not provided.</p>";
}

include 'mortgage_calculator.php'
?>
