<?php
require_once('../../Entity/listing.php');

class EditListingController {
    private $Listing;

    public function __construct($conn) {
        $this->Listing = new Listing($conn);
    }

    public function getListingDetails($listing_id) {
        return $this->Listing->getListingDetails($listing_id);
    }

    public function editListing($listing_id, $location, $type, $price, $size, $rooms) {
        return $this->Listing->editListing($listing_id, $location, $type, $price, $size, $rooms);
    }
}
?>
