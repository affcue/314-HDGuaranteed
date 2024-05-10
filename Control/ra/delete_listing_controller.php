<?php
session_start(); // Start the session

require_once('../../Database/db_conn.php');
require_once('../../Entity/listing.php');

class DeleteListingController {
    private $Listing;

    public function __construct($conn) {
        $this->Listing = new Listing($conn);
    }

    public function deleteListing($listing_id) {
        return $this->Listing->deleteListing($listing_id);
    }
}

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['listing_id'])) {
    $listing_id = $_GET['listing_id'];
    
    $deleteListingController = new DeleteListingController($conn);
    $success = $deleteListingController->deleteListing($listing_id);
}

header("Location: ../../Boundary/ra/my_listings.php");
exit();
?>
