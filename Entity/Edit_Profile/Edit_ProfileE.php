<?php
include 'My_ListingsE.php'; // Include the Entity class to manage data operations

class ListingsController {
    private $listingManager;

    public function __construct(ListingManager $manager) { // Constructor to initialize the ListingManager
        $this->listingManager = $manager;
    }

    public function getListings($agentId) { // Fetch listings associated with a specific agent
        return $this->listingManager->fetchAllListingsByAgent($agentId);
    }

    public function createListing($data) { // Handle the creation of a new listing
        return $this->listingManager->addListing($data);
    }

    public function updateListing($listingId, $data) { // Handle updates to an existing listing
        return $this->listingManager->updateListing($listingId, $data);
    }

    public function deleteListing($listingId) { // Handle the deletion of a listing
        return $this->listingManager->deleteListing($listingId);
    }
}
