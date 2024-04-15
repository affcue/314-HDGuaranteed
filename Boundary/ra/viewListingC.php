<?php
include("config.php");

// Check if listing ID is provided in the URL
if (isset($_GET['id'])) {
    $listing_id = $_GET['id'];
    // Include the entity file to retrieve and output the listing details
    include("viewListingE.php");
} else {
    // If listing ID is not provided, display an error message
    echo "Listing ID not provided.";
}
?>
