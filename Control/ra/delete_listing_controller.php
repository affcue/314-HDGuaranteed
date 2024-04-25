<?php
session_start(); // Start the session

require_once('../../Database/db_conn.php');
require_once('../../Entity/ra/delete_listing_entity.php');

class DeleteListingController {
    private $deleteListingEntity;

    public function __construct($conn) {
        $this->deleteListingEntity = new DeleteListingEntity($conn);
    }

    public function deleteListing($listing_id) {
        return $this->deleteListingEntity->deleteListing($listing_id);
    }
}

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['listing_id'])) {
    $listing_id = $_GET['listing_id'];
    
    $deleteListingController = new DeleteListingController($conn);
    $success = $deleteListingController->deleteListing($listing_id);
    
    if ($success) {
        $_SESSION['notification'] = "Listing deleted successfully!";
    } else {
        $_SESSION['notification'] = "Failed to delete listing.";
    }
}

header("Location: ../../Boundary/ra/my_listings.php");
exit();
?>