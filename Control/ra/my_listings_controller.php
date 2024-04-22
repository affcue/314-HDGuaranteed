<?php
require_once('../../Database/config.php');
require_once('../../Entity/ra/my_listings_entity.php');

class MyListingsController {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function getAllListingsByRAID($ra_id) {
        $myListingsEntity = new MyListingsEntity($this->conn);
        return $myListingsEntity->getListingsByRAID($ra_id);
    }
}

// Example usage
// $myListingsController = new MyListingsController($conn);
// $ra_id = 1; // Get this from session or URL parameter
// $listings = $myListingsController->getAllListingsByRAID($ra_id);
?>
