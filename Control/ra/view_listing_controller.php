<?php
require_once('../../Database/db_conn.php');
require_once('../../Entity/ra/listing.php');

class ViewListingController {
    private $Listing;

    public function __construct($conn) {
        $this->Listing = new Listing($conn);
    }

    public function getListingByListingID($listing_id) {
        return $this->Listing->getListingByListingID($listing_id);
    }
}

$viewListingController = new ViewListingController($conn);
?>