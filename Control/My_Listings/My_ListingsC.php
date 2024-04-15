<?php
include 'My_ListingsE.php'; // Include the Entity class

class ListingsController {
    private $listingManager;

    public function __construct(ListingManager $manager) {
        $this->listingManager = $manager;
    }

    public function getListings($agentId) {
        return $this->listingManager->fetchAllListingsByAgent($agentId);
    }

    public function deleteListing($listingId) {
        return $this->listingManager->deleteListing($listingId);
    }
}
