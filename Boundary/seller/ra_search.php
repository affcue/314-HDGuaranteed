<?php
session_start(); // Start the session

// Check if the seller username is set in the session
if (!isset($_SESSION['user_id'])) {
    // Redirect to the seller login page if not logged in
    header("Location: ../../Boundary/seller/seller_login_boundary.php");
    exit();
}
if (!isset($_SESSION['username'])) {
    // Redirect to the seller login page if not logged in
    header("Location: ../../Boundary/seller/seller_login_boundary.php");
    exit();
}
$username = $_SESSION['username']; // Retrieve username from session
?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RA Search</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        .container {
            width: 80%;
            margin: auto;
        }
        .title {
            text-align: center;
            margin-top: 20px;
        }
        .search-bar {
            text-align: center;
            margin-top: 20px;
        }
        .filter-options {
            margin-top: 20px;
        }
        .listings {
            margin-top: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
    <!-- Link to external stylesheet for Roboto font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
</head>

<body>
<?php include 'header.php' ?>

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
            // Include the RA class
            include("../../Database/db_conn.php");
            include("../../Entity/ra.php");

            // Create an instance of RAEntity class
            $raEntity = new RA($conn);

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
    </div>
</body>

</html>
