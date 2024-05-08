<?php
require_once('../../Database/db_conn.php');
require_once('../../Entity/listing.php');

class ViewListingController {
    private $Listing;

    public function __construct($conn) {
        $this->Listing = new Listing($conn);
    }

    public function getListingByListingID($listing_id) {
        $this->Listing->updateViewCount($listing_id);
        return $this->Listing->getListingByListingID($listing_id);
    }

    public function isShortlisted($user_id, $listing_id) {
        return $this->Listing->isShortlistedByUser($user_id, $listing_id);
    }
}

$viewListingController = new ViewListingController($conn);
?>
