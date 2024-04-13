<?php
require_once 'config.php';

class viewListingE {
    public function __construct($listing_id) {
        global $conn; // Access the database connection from config.php

        try {
            $sql = "SELECT * FROM listing WHERE listing_id = $listing_id";
            $result = $conn->query($sql);

            if ($result && $result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $this->renderListing($row);
                }
            } else {
                echo "Listing not found";
            }
        } catch(Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    private function renderListing($row) {
?>
<div class="title"><?php echo $row["location"]; ?></div>
<div class="postal-code"><?php echo $row["postal"]; ?> | <?php echo $row["region"]; ?></div>
<div class="property-type">Property Type: <?php echo $row["type"]; ?></div>
<div class="price">Asking Price: $<?php echo number_format($row["price"]); ?></div>
<div class="floor-size">Floor size: <?php echo $row["size"]; ?> sqf</div>
<div class="bedroom"><?php echo $row["rooms"]; ?> Bedroom</div>
<div class="views"><?php echo $row["views"]; ?> views | <?php echo $row["shortlists"]; ?> Currently shortlisted</div>
<?php
    }
}
?>
