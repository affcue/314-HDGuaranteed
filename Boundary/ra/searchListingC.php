<?php
include_once 'config.php';

class searchListingC {
    private $entity;
    private $boundary;

    public function __construct(searchListingE $entity, searchListingB $boundary) {
        $this->entity = $entity;
        $this->boundary = $boundary;
    }

    public function processSearch() {
        // Get form data from Boundary
        $formData = $this->boundary->getFormData();

        // Extract search parameters
        $searchTerm = isset($formData['search']) ? $formData['search'] : "";
        $region = isset($formData['region']) ? $formData['region'] : "";
        $propertyType = isset($formData['property_type']) ? $formData['property_type'] : "";

        // Call search method in Entity
        $listings = $this->entity->searchListings($searchTerm, $region, $propertyType);

        // Pass listings to Boundary for display
        $this->boundary->displayListings($listings);
    }
}

// Include the entity class
include_once 'searchListingE.php'; // Include the entity class

// Instantiate the Entity and Boundary classes
$entity = new searchListingE($conn); // Assuming $conn is your database connection
$boundary = new searchListingB();

// Instantiate the searchListingC class and process the search
$searchListingC = new searchListingC($entity, $boundary);
$searchListingC->processSearch();
?>
