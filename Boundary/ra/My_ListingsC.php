<?php
// My_ListingsC.php

require 'My_ListingsC.php';  

session_start();
$pdo = new PDO("mysql:host=localhost;dbname=your_database_name", "your_username", "your_password");
$listings = new Listings($pdo);

$raId = $_SESSION['ra_id'];  // Make sure to handle session authentication properly

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete'])) {
    $listingId = $_POST['listing_id'];
    if ($listings->deleteListing($raId, $listingId)) {
        echo "Listing deleted successfully.";
    } else {
        echo "Failed to delete listing.";
    }
}

$userListings = $listings->getAgentListings($raId);
?>
