<?php
session_start(); // Start the session

// Check if the seller username is set in the session
if (!isset($_SESSION['user_id'])) {
    // Redirect to the seller login page if not logged in
    header("Location: ../../Boundary/seller/seller_login_boundary.php");
    exit();
}

?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RA Search</title>
    <!-- Include the provided CSS styles -->
    <style>
        body {
            display: flex;
            flex-direction: column; /* Set flex direction to column */
            align-items: center;
            margin: 20;
            min-height: 100vh; /* Set min-height to occupy the full height */
            background-color: white;
        }

        .adminmenu-container {
            text-align: left;
            padding: 20px;
            background-color: white;
            width: 80%;
            max-width: 800px; /* Set max-width for better responsiveness */
            margin-top: 20px; /* Add margin-top to create space between header and content */
        }

        /* Adjust header styles for positioning */
        .header {
            background-color: #bbb;
            color: #333;
            padding: 10px;
            width: 100%; /* Set width to 100% to occupy full width */
        }

        .buttons {
            display: flex;
            justify-content: space-between; /* Align buttons to the ends */
            align-items: center;
        }

        .buttons button {
            background-color: #007bff;
            color: white;
            padding: 8px 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-family: 'Roboto', sans-serif;
        }

        /* Styles for the table */
        table {
            border-collapse: collapse;
            width: 100%;
            border: 1px solid #ccc;
            margin-top: 20px; /* Add margin-top for spacing */
        }

        th,
        td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: left;
        }

        .view-button {
            display: inline-block;
            padding: 8px 12px;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
    </style>
    <!-- Link to external stylesheet for Roboto font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
</head>

<body>
    <div class="header"> <!-- Header outside of adminmenu-container -->
        <div class="buttons">
            <button onclick="window.location.href='ra/ra_search.php'">Find Agent</button>
            <button onclick="window.location.href='search_listing.php'">Find Listing</button>
            <div style="margin-right: 10px;"></div> <!-- Spacer -->
            <button onclick="window.location.href='ra_home.php'">Back to Home</button>
            <button onclick="window.location.href='logout.php'">Logout</button>
        </div>
    </div>

    <div class="adminmenu-container">
        <h1>RA Search</h1>
        <form method="POST">
            <label for="search_query">Search:</label>
            <input type="text" name="search_query" placeholder="Search for agent's name">
            <button type="submit" name="search">Search</button>
        </form>

        <table>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Contact</th>
                <th>Action</th>
            </tr>
            <?php
            // Include the RAEntity class
            include("../../Entity/ra/ra_entity.php");

            // Create an instance of RAEntity class
            $raEntity = new RAEntity();

            // Get the search query from the form
            $search_query = isset($_POST['search_query']) ? trim($_POST['search_query']) : null;

            // Fetch RA data based on the search query
            $raData = $raEntity->fetchRAData($search_query);

            // Display the search results
            if (!empty($raData)) {
                foreach ($raData as $ra) {
                    echo "<tr>";
                    echo "<td>{$ra['name']}</td>";
                    echo "<td>{$ra['e-mail']}</td>";
                    echo "<td>{$ra['contact']}</td>";
                    echo "<td><a href='ra_view.php?ra_id={$ra['ra_id']}&name=" . urlencode($ra['name']) . "' class='view-button'>View</a></td>";


                    echo "</tr>";
                }
            } else {
                // No search results found
                echo "<tr><td colspan='4'>No search results found for " . htmlspecialchars($search_query) . ". Kindly click search button to retry</td></tr>";
            }
            ?>
        </table>
        <br></br>
        <button onclick="window.location.href='ra_home.php'">Back to Home</button>
    </div>
</body>

</html>
