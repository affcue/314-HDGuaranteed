<?php
require_once('../../Database/config.php');
require_once('../../Entity/listing.php');

class MyListingsController {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function getAllListingsByRAID($ra_id) {
        $Listing = new Listing($this->conn);
        return $Listing->getListingsByRAID($ra_id);
    }
}

// Example usage
// $myListingsController = new MyListingsController($conn);
// $ra_id = 1; // Get this from session or URL parameter
// $listings = $myListingsController->getAllListingsByRAID($ra_id);
?>
