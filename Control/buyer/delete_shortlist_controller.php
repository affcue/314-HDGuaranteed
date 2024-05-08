<?php
// Include necessary files
require_once('../../Database/db_conn.php');
require_once('../../Entity/listing.php');

// Start session
session_start();

// Check if the form is submitted via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the listing_id is provided
    if (isset($_POST['listing_id'])) {
        // Get the listing_id from the form data
        $listing_id = $_POST['listing_id'];

        // Check if the user is logged in
        if (isset($_SESSION['user_id'])) {
            // Get the user_id from the session
            $user_id = $_SESSION['user_id'];

            // Create a new Listing object
            $listing = new Listing($conn);

            // Remove the listing from the shortlist
            $result = $listing->removeFromShortlist($listing_id, $user_id);

            // Check if the shortlist removal was successful
            if ($result) {
                // Redirect back to the view_listing.php page with a success message
                header("Location: ../../Boundary/buyer/view_listing.php?listing_id=$listing_id&success=1");
                exit();
            } else {
                // Redirect back to the view_listing.php page with an error message
                header("Location: ../../Boundary/buyer/view_listing.php?listing_id=$listing_id&error=1");
                exit();
            }
        } else {
            // User is not logged in, redirect to login page
            header("Location: ../../Boundary/seller/seller_login_boundary.php");
            exit();
        }
    } else {
        // listing_id is not provided, redirect back to the view_listing.php page
        header("Location: ../../Boundary/buyer/view_listing.php?error=2");
        exit();
    }
} else {
    // Form is not submitted via POST, redirect back to the view_listing.php page
    header("Location: ../../Boundary/buyer/view_listing.php");
    exit();
}
?>
