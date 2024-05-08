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
?>
