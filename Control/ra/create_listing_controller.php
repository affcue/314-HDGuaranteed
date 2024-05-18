<?php
session_start(); // Start the session

require_once('../../Database/db_conn.php');
require_once('../../Entity/listing.php');

class CreateListingController {
    private $Listing;

    public function __construct($conn) {
        $this->Listing = new Listing($conn);
    }

    public function createListing($location, $type, $price, $size, $rooms) {
        // Check if ra_id is set in the session
        if(isset($_SESSION['ra_id'])) {
            $ra_id = $_SESSION['ra_id'];
            return $this->Listing->createListing($ra_id, $location, $type, $price, $size, $rooms);
        } else {
            // Handle the case where ra_id is not set
            return false;
            echo "Error creating listing ";
        }
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $location = $_POST['location'];
    $type = $_POST['type'];
    $price = $_POST['price'];
    $size = $_POST['size'];
    $rooms = $_POST['rooms'];
    
    $createListingController = new CreateListingController($conn);
    $success = $createListingController->createListing($location, $type, $price, $size, $rooms);
    
    header("Location: ../../Boundary/ra/my_listings.php");
    exit();
}
?>
