<?php
// Include the config.php file
include("config.php");
include ("header.php");

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
            while($row = $result->fetch_assoc()) {
                $this->outputListingDetails($row);
            }
        } else {
            echo "Listing not found";
        }
    }

    // Method to output listing details
    private function outputListingDetails($row) {
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Property Details</title>
            <style>
                body {
                    font-family: Arial, sans-serif;
                    background-color: #f0f0f0;
                }
                .container {
                    margin: 20px auto;
                    width: 80%;
                    text-align: left;
                }
                .title {
                    font-size: 24px;
                    font-weight: bold;
                    margin-bottom: 10px;
                }
                .postal-code {
                    font-style: italic;
                    margin-bottom: 5px;
                }
                .property-type {
                    margin-bottom: 5px;
                }
                .price {
                    font-size: 20px;
                    font-weight: bold;
                    margin-bottom: 5px;
                }
                .floor-size {
                    margin-bottom: 5px;
                }
                .bedroom {
                    margin-bottom: 5px;
                }
                .views {
                    margin-bottom: 10px;
                }
            </style>
        </head>
        <body>
            <div class="container">
                <div class="title"><?php echo $row["location"]; ?></div>
                <div class="postal-code"><?php echo $row["postal"]; ?> | <?php echo $row["region"]; ?></div>
                <div class="property-type">Property Type: <?php echo $row["type"]; ?></div>
                <div class="price">Asking Price: $<?php echo number_format($row["price"]); ?></div>
                <div class="floor-size">Floor size: <?php echo $row["size"]; ?> sqf</div>
                <div class="bedroom"><?php echo $row["rooms"]; ?> Bedroom</div>
                <div class="views"><?php echo $row["views"]; ?> views | <?php echo $row["shortlists"]; ?> Currently shortlisted</div>
            </div>
        </body>
        </html>
        <?php
    }
}

// Create an instance of ListingDetails class
$listing = new ListingDetails($conn);

// Check if listing ID is provided in the URL
if(isset($_GET['id'])) {
    $listing_id = $_GET['id'];
    $listing->getListingDetails($listing_id);
} else {
    // If listing ID is not provided, display an error message or redirect
    echo "Listing ID not provided.";
}
?>
