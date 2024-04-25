<?php
include 'header.php'
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Property Search</title>
    <style>
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
                <input type="radio" name="property_type" value="Condominium">Condominium
                <input type="radio" name="property_type" value="Landed Property">Landed Property
                <input type="radio" name="property_type" value="HDB Flat">HDB Flat
                <button type="submit">Apply Filters</button>
            </form>
        </div>
        <div class="listing-info">
            <table border="1">
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
                <?php
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
                } catch(mysqli_sql_exception $e) {
                    echo "You are not connected";
                }

                // Function to execute the search query
                function searchListings($conn, $searchTerm, $region = null, $propertyType = null) {
                    $sql = "SELECT * FROM listing WHERE 1=1"; // Start with a true condition
                    if ($searchTerm) {
                        $sql .= " AND (location LIKE '%$searchTerm%' OR type LIKE '%$searchTerm%')";
                    }
                    if ($region) {
                        $sql .= " AND region = '$region'";
                    }
                    if ($propertyType) {
                        $sql .= " AND type = '$propertyType'";
                    }
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        // Output data of each row within the table
                        while($row = $result->fetch_assoc()) {
                            echo "<tr>
                                    <td>" . $row["location"] . "</td>
                                    <td>" . $row["type"] . "</td>
                                    <td>$" . number_format($row["price"]) . "</td>
                                    <td>" . $row["size"] . " sqf</td>
                                    <td>" . $row["rooms"] . "</td>
                                    <td>" . $row["views"] . "</td>
                                    <td>" . $row["shortlists"] . "</td>
                                    <td><a href='view_listing_boundary.php?id=" . $row["listing_id"] . "'>View</a></td>
                                </tr>";
                        }
                    } else {
                        // If no results found, display a message in a single row
                        echo "<tr><td colspan='8'>0 results found</td></tr>";
                    }
                }

                // Perform search if form is submitted
                if(isset($_POST['submit'])) {
                    $search = $_POST['search'];
                } else {
                    $search = "";
                }
                if(isset($_POST['region'])) {
                    $region = $_POST['region'];
                } else {
                    $region = "";
                }
                if(isset($_POST['property_type'])) {
                    $propertyType = $_POST['property_type'];
                } else {
                    $propertyType = "";
                }

                // If search is performed, display search results
                if(isset($_POST['submit']) || isset($_POST['region']) || isset($_POST['property_type'])) {
                    searchListings($conn, $search, $region, $propertyType);
                }

                // Close the database connection
                $conn->close();
                ?>
            </table>
        </div>
    </div>
</body>
</html>
