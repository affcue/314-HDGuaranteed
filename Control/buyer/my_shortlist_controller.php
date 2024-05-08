<?php
require_once('../../Database/db_conn.php');
require_once('../../Entity/listing.php');

class MyShortlistController {
    private $Listing;

    public function __construct($conn) {
        $this->Listing = new Listing($conn);
    }

    public function getShortlistedListings($user_id) {
        return $this->Listing->getShortlistedListings($user_id);
    }
}

$myShortlistController = new MyShortlistController($conn);
?>
