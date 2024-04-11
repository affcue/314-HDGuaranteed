<?php
require_once('Listings.php');

class ListingsController {
    private $listingsModel;

    public function __construct($pdo) {
        $this->listingsModel = new Listings($pdo);
    }

    public function getUserListings($userId) {
        if (!is_numeric($userId) || $userId <= 0) {
            // Ideally, handle this case properly, maybe log it or return a user-friendly error
            throw new InvalidArgumentException("Invalid user ID.");
        }
        return $this->listingsModel->getListingsByUserId($userId);
    }
}
