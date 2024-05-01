<?php
require_once('../../Database/db_conn.php');
require_once('../../Entity/listing.php');

class SearchListingController {
    private $Listing;

    public function __construct($conn) {
        $this->Listing = new Listing($conn);
    }

    public function searchListings($searchTerm = null, $filter = null, $filterValue = null) {
        return $this->Listing->searchListing($searchTerm, $filter, $filterValue);
    }

    public function getAllListings() {
        return $this->Listing->getAllListings();
    }

    public function handleSearch($searchTerm) {
        if (!empty($searchTerm)) {
            // If any search criteria is provided, perform search
            return $this->searchListings($searchTerm);
        } else {
            // If no search criteria provided, fetch all listings
            return $this->getAllListings();
        }
    }
}

$searchListingController = new SearchListingController($conn);
?>
