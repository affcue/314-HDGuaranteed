<?php
include "header.php";
include "../../Control/ra/search_listing_controller.php"; // Include the controller

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    // Get search term and filters
    $searchTerm = $_POST['search'];

    // Call handleSearch method of SearchListingController
    $listings = $searchListingController->handleSearch($searchTerm);
} else {
    // If form is not submitted, fetch full list of listings
    $listings = $searchListingController->getAllListings(); // No search term provided, so it fetches all listings
}

// Debugging code to verify the contents of $listings
if(isset($listings) && !empty($listings)) {
    // Debugging code to verify the contents of $listings
    ;
} else {
    echo "<p>No listings found.</p>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Listings</title>
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
</head>
<body>
    <div class="container">
        <h2 class="title">Search Listings</h2>
        <div class="search-bar">
            <form method="POST" action="">
                <input type="text" name="search" placeholder="Search by location...">
                <button type="submit" name="submit">Search</button>
            </form>
        <!-- Display listings if available -->
        <?php if(isset($listings) && !empty($listings)): ?>
            <div class="listings">
                <table>
                    <thead>
                        <tr>
                            <th>Listing ID</th>
                            <th>RA ID</th>
                            <th>User ID</th>
                            <th>Region</th>
                            <th>Type</th>
                            <th>Location</th>
                            <th>Postal</th>
                            <th>Price</th>
                            <th>Rooms</th>
                            <th>Size</th>
                            <th>Views</th>
                            <th>Shortlists</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($listings as $listing): ?>
                            <tr>
                                <td><?php echo $listing['listing_id']; ?></td>
                                <td><?php echo $listing['ra_id']; ?></td>
                                <td><?php echo $listing['user_id']; ?></td>
                                <td><?php echo $listing['region']; ?></td>
                                <td><?php echo $listing['type']; ?></td>
                                <td><?php echo $listing['location']; ?></td>
                                <td><?php echo $listing['postal']; ?></td>
                                <td><?php echo $listing['price']; ?></td>
                                <td><?php echo $listing['rooms']; ?></td>
                                <td><?php echo $listing['size']; ?></td>
                                <td><?php echo $listing['views']; ?></td>
                                <td><?php echo $listing['shortlists']; ?></td>
                                <td><a href="view_listing.php?listing_id=<?php echo $listing['listing_id']; ?>" class="btn btn-primary">View</a></td>                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php else: ?>
            <p>No listings found.</p>
        <?php endif; ?>
    </div>
</body>
</html>
