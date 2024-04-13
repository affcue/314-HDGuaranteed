<?php
// Include the entity file
include 'searchListingE.php';

// Create instance of ListingEntity
$listingEntity = new ListingEntity();

// Perform search if form is submitted
if(isset($_POST['submit']) || isset($_POST['region']) || isset($_POST['property_type'])) {
    // Get search parameters
    $search = isset($_POST['search']) ? $_POST['search'] : "";
    $region = isset($_POST['region']) ? $_POST['region'] : "";
    $propertyType = isset($_POST['property_type']) ? $_POST['property_type'] : "";

    // Call the method to search listings
    $listings = $listingEntity->searchListings($search, $region, $propertyType);

    // Display the listings
    echo $listingEntity->displayListings($listings);
}
?>
