<?php
include 'viewListingE.php';

class viewListingC {
    public function __construct() {
        if(isset($_GET['id'])) {
            $listing_id = $_GET['id'];
            new viewListingE($listing_id);
        } else {
            echo "Listing ID not provided.";
        }
    }
}

new viewListingC();
?>
