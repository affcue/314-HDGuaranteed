<?php
include 'My_ListingsE.php'; // Include the Entity class

class ListingsController {
    private $listingManager;

    public function __construct(ListingManager $manager) { // Constructor to initialize the ListingManager
        $this->listingManager = $manager;
    }

    public function getListings($agentId) { // Fetch listings for a specific agent
        return $this->listingManager->fetchAllListingsByAgent($agentId);
    }

    public function createListing($data) { // Create a new listing
        return $this->listingManager->addListing($data);
    }

    public function updateListing($listingId, $data) { // Update an existing listing
        return $this->listingManager->updateListing($listingId, $data);
    }

    public function deleteListing($listingId) { // Delete a listing
        return $this->listingManager->deleteListing($listingId);
    }
}
?>