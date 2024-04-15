<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Listings</title>
    <link rel="stylesheet" href="style.css"> <!-- Link to external CSS for styling -->
</head>
<body>
    <header>
        <a href="raHome.php" class="nav-button left">Home</a> <!-- Navigation button for home -->
        <div class="nav-buttons right">
            <a href="searchAgent.php" class="nav-button">Find Listing</a> <!-- Button to find listings -->
            <a href="searchListing.php" class="nav-button">Find Agent</a> <!-- Button to find agents -->
            <a href="logout.php" class="nav-button">Logout</a> <!-- Logout button -->
        </div>
    </header>
    <main>
        <h1>My Listings</h1>
        <button onclick="location.href='createListing.php'">Create New Listing +</button> <!-- Button to create a new listing -->
        <?php foreach ($listings as $listing): ?> <!-- Loop to display each listing -->
        <section class="listing-container">
            <div class="listing">
                <span><?= htmlspecialchars($listing['location']) ?> | <?= htmlspecialchars($listing['type']) ?> | $<?= htmlspecialchars($listing['price']) ?> | <?= htmlspecialchars($listing['size']) ?> sqft | <?= htmlspecialchars($listing['rooms']) ?>
                rooms | <?= htmlspecialchars($listing['views']) ?> views | <?= htmlspecialchars($listing['shortlists']) ?> shortlisted</span>
                <div class="listing-actions">
                    <button onclick="location.href='editListing.php?listing_id=<?= $listing['listing_id'] ?>'">Edit</button> <!-- Button to edit the listing -->
                    <button onclick="if(confirm('Are you sure you want to delete this listing?')) location.href='deleteListing.php?listing_id=<?= $listing['listing_id'] ?>'">Delete</button> <!-- Button to delete the listing -->
                </div>
            </div>
        </section>
        <?php endforeach; ?>
    </main>
</body>
</html>
