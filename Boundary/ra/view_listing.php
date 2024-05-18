<?php
include "header.php";
include "../../Control/ra/view_listing_controller.php";

// Check if a listing ID is provided in the URL
if(isset($_GET['listing_id'])) {
    // Retrieve the listing details using the provided listing ID
    $listing_id = $_GET['listing_id'];
    $listing = $viewListingController->getListingByListingID($listing_id);
    
    // Check if the listing exists
    if($listing) {
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
        </div>
    </div>
</body>
</html>
<?php
    } else {
        echo "<p>Listing not found.</p>";
    }
}
?>
