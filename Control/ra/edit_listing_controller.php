<?php
require_once('../../Entity/ra/edit_listing_entity.php');

class EditListingController {
    private $editListingEntity;

    public function __construct($conn) {
        $this->editListingEntity = new EditListingEntity($conn);
    }

    public function getListingDetails($listing_id) {
        return $this->editListingEntity->getListingDetails($listing_id);
    }

    public function editListing($listing_id, $location, $type, $price, $size, $rooms) {
        return $this->editListingEntity->editListing($listing_id, $location, $type, $price, $size, $rooms);
    }
}
?>
