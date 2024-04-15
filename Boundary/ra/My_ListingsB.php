<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Listings</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <a href="raHome.php" class="nav-button left">Home</a>
        <div class="nav-buttons right">
            <a href="searchAgent.php" class="nav-button">Find Listing</a>
            <a href="searchListing.php" class="nav-button">Find Agent</a>
            <a href="logout.php" class="nav-button">Logout</a>
        </div>
    </header>
    <main>
        <h1>My Listings</h1>
        <button onclick="location.href='createListing.php'">Create New Listing +</button>
        <?php foreach ($listings as $listing): ?>
        <section class="listing-container">
            <div class="listing">
                <span><?= htmlspecialchars($listing['location']) ?> | <?= htmlspecialchars($listing['type']) ?> | $<?= htmlspecialchars($listing['price']) ?> | <?= htmlspecialchars($listing['size']) ?> sqft | <?= htmlspecialchars($listing['rooms']) ?> rooms | <?= htmlspecialchars($listing['views']) ?> views | <?= htmlspecialchars($listing['shortlists']) ?> shortlisted</span>
                <div class="listing-actions">
                    <button onclick="location.href='editListing.php?listing_id=<?= $listing['listing_id'] ?>'">Edit</button>
                    <button onclick="if(confirm('Are you sure you want to delete this listing?')) location.href='deleteListingProcess.php?listing_id=<?= $listing['listing_id'] ?>'">Delete</button>
                </div>
            </div>
        </section>
        <?php endforeach; ?>
    </main>
</body>
</html>
