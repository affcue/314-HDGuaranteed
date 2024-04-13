<?php
// Check if listing ID is provided in the URL
if(isset($_GET['id'])) {
    $listing_id = $_GET['id'];
    include 'viewListingE.php'; // Delegate data retrieval to entity
} else {
    // If listing ID is not provided, display an error message or redirect
    echo "Listing ID not provided.";
}
?>
