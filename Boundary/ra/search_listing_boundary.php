<?php
include "header.php";
include_once __DIR__ . '/../../Entity/search_listing_entity.php';

// Define the SearchBoundary class
class searchListingB {
    public function displayForm() {
        // Display HTML form for search
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Property Search</title>
            <style>
        /* Your CSS styles here */
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
        }
        .container {
            margin: 20px auto;
            width: 80%;
            text-align: center;
        }
        input[type="text"] {
            padding: 10px;
            width: 60%;
            margin-right: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            font-size: 16px;
        }
        button {
            padding: 10px 20px;
            border: none;
            background-color: #007bff;
            color: #fff;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
        button:hover {
            background-color: #0056b3;
        }
        .button-group {
            margin-top: 10px;
            margin-bottom: 20px;
        }
        .button-group button {
            margin: 0 5px;
        }
        .listing-info {
            padding-bottom: 10px;
            margin-bottom: 20px;
            text-align: left;
        }
        .listing-info th, .listing-info td {
            padding: 8px;
            text-align: left;
        }
        .listing-info button {
            margin-left: 10px;
        }
        table {
            margin: 0 auto; /* Center-align the table */
        }
    </style>
        </head>
        <body>
        <div class="container">
            <div class="input-group">
                <form method="POST" action="">
                    <input type="text" name="search" placeholder="Search for...">
                    <button type="submit" name="submit">Search</button>
                </form>
            </div>
            <div class="button-group">
                <form method="POST" action="">
                    <input type="radio" name="region" value="north">North
                    <input type="radio" name="region" value="south">South
                    <input type="radio" name="region" value="east">East
                    <input type="radio" name="region" value="west">West
                    <input type="radio" name="region" value="central">Central
                    <br>
                    <input type="radio" name="property_type" value="Condominium">Condominium
                    <input type="radio" name="property_type" value="Landed Property">Landed Property
                    <input type="radio" name="property_type" value="HDB Flat">HDB Flat
                    <button type="submit">Apply Filters</button>
                </form>
            </div>
            <div class="listing-info">
                <!-- Listing information will be displayed here -->
            </div>
        </div>
        </body>
        </html>
        <?php
    }

    public function displayListings($listings) {
        // Display listings in HTML table
        ?>
        <table border='1'>
            <tr>
                <th>Listing location</th>
                <th>Property type</th>
                <th>Price</th>
                <th>Floor size</th>
                <th>No. of rooms</th>
                <th>Views</th>
                <th>Currently shortlisted</th>
                <th>Action</th>
            </tr>
            <?php foreach ($listings as $row): ?>
                <tr>
                    <td><?= $row['location'] ?></td>
                    <td><?= $row['type'] ?></td>
                    <td>$<?= number_format($row['price']) ?></td>
                    <td><?= $row['size'] ?> sqf</td>
                    <td><?= $row['rooms'] ?></td>
                    <td><?= $row['views'] ?></td>
                    <td><?= $row['shortlists'] ?></td>
                    <td><a href='<?php echo "view_listing_boundary.php?id=" . $row['listing_id'] ?>'>View</a></td>

                </tr>
            <?php endforeach; ?>
        </table>
        <?php
    }

    public function getFormData() {
        // Retrieve form data from $_POST or $_GET
        return $_POST; // For simplicity, you might want to sanitize and validate input
    }
}

// Instantiate the searchListingB class
$searchListingB = new searchListingB();

// Display the search form
$searchListingB->displayForm();

// Include the control class and process the search
include __DIR__ . '/../../Control/search_listing_controller.php';

?>