<?php
include_once  'config.php'; // Adjust the include path

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
        global $conn; // Access the global $conn variable defined in config.php
        $listings = $this->entity->searchListings($searchTerm, $region, $propertyType);

        // Pass listings to Boundary for display
        $this->boundary->displayListings($listings);
    }
}

// Include the entity class
include_once __DIR__ . '/../Entity/search_listing_entity.php';

// Instantiate the Entity and Boundary classes
$entity = new searchListingE($conn); // Assuming $conn is your database connection, defined in config.php
$boundary = new searchListingB();

// Instantiate the searchListingC class and process the search
$searchListingC = new searchListingC($entity, $boundary);
$searchListingC->processSearch();
?>
