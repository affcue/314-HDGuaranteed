<?php
// Define a class for handling listing details
class ListingDetails {
    private $conn;

    // Constructor to initialize database connection
    public function __construct($connection) {
        $this->conn = $connection;
    }

    // Method to retrieve listing details from the database
    public function getListingDetails($listing_id) {
        $sql = "SELECT * FROM listing WHERE listing_id = $listing_id";
        $result = $this->conn->query($sql);

        if ($result->num_rows > 0) {
            // Output data of the listing
            while ($row = $result->fetch_assoc()) {
                // Return the listing details
                return $row;
            }
        } else {
            // If listing not found, return null
            return null;
        }
    }
}

// Create an instance of ListingDetails class
$listing = new ListingDetails($conn);

// Retrieve the listing details
$listing_id = $_GET['id'];
$listingDetails = $listing->getListingDetails($listing_id);
?>
<body>
    <div class="container">
        <div class="title"><?php echo $listingDetails["location"]; ?></div>
        <div class="postal-code"><?php echo $listingDetails["postal"]; ?> | <?php echo $listingDetails["region"]; ?></div>
        <div class="property-type">Property Type: <?php echo $listingDetails["type"]; ?></div>
        <div class="price">Asking Price: $<?php echo number_format($listingDetails["price"]); ?></div>
        <div class="floor-size">Floor size: <?php echo $listingDetails["size"]; ?> sqf</div>
        <div class="bedroom"><?php echo $listingDetails["rooms"]; ?> Bedroom</div>
        <div class="views"><?php echo $listingDetails["views"]; ?> views | <?php echo $listingDetails["shortlists"]; ?> Currently shortlisted</div>
    </div>
</body>
</html>
