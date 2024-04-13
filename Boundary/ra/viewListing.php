<?php
include 'header.php';
?>

<div class="container">
    <?php
    // Check if listing ID is provided in the URL
    if(isset($_GET['id'])) {
        $listing_id = $_GET['id'];

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
    } else {
        // If listing ID is not provided, display an error message or redirect
        echo "Listing ID not provided.";
    }
    ?>
</div>

<!-- CSS Styles -->
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

</body>
</html>
