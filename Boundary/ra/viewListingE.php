<?php
// Your database connection code
$db_server = "localhost";
$db_user = "root";
$db_pass = ""; // Update this with your database password
$db_name = "314hdguaranteed";
$conn = "";

try {
    $conn = new mysqli($db_server, $db_user, $db_pass, $db_name);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Retrieve listing details from the database based on the listing ID
    $sql = "SELECT * FROM listing WHERE listing_id = $listing_id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Output data of the listing
        while($row = $result->fetch_assoc()) {
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
    } else {
        echo "Listing not found";
    }

    // Close the database connection
    $conn->close();
} catch(mysqli_sql_exception $e) {
    echo "You are not connected";
}
?>
