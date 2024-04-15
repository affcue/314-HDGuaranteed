<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Listings</title>
    <link rel="stylesheet" href="style.css"> <!-- Link to CSS for styling the page -->
</head>
<body>
    <header>
        <a href="raHome.php" class="nav-button left">Home</a> <!-- Navigation link to Home page -->
        <div class="nav-buttons right">
            <a href="searchAgent.php" class="nav-button">Find Listing</a> <!-- Link to find listings -->
            <a href="searchListing.php" class="nav-button">Find Agent</a> <!-- Link to find agents -->
            <a href="logout.php" class="nav-button">Logout</a> <!-- Link to logout functionality -->
        </div>
    </header>
    <main>
        <h1>My Listings</h1>
        <button class="create-button" onclick="createListing()">Create New Listing +</button> <!-- Button to trigger listing creation -->
        <?php foreach ($listings as $listing): ?> <!-- Loop through each listing and display details -->
        <section class="listing-container">
            <div class="listing">
                <span><?= htmlspecialchars($listing['location']) ?> | <?= htmlspecialchars($listing['type']) ?> | $<?= htmlspecialchars($listing['price']) ?> | <?= htmlspecialchars($listing['size']) ?> sqft | <?= htmlspecialchars($listing['rooms']) ?>
                rooms | <?= htmlspecialchars($listing['views']) ?> views | <?= htmlspecialchars($listing['shortlists']) ?> shortlisted</span>
                <div class="listing-actions">
                    <button onclick="editListing(<?= $listing['listing_id'] ?>)">Edit</button> <!-- Button to trigger edit function -->
                    <button onclick="deleteListing(<?= $listing['listing_id'] ?>)">Delete</button> <!-- Button to trigger delete function -->
                </div>
            </div>
        </section>
        <?php endforeach; ?>
    </main>
    <script>
        function createListing() {
            // Placeholder for create listing function
        }
        function editListing(listingId) {
            // Placeholder for edit listing function
        }
        function deleteListing(listingId) {
            // Placeholder for delete listing function
        }
    </script>
</body>
</html>
