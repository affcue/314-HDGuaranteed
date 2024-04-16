<!-- My_ListingsB.php -->
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
        <a href="home.php" class="nav-button left">Home</a>
        <div class="nav-buttons right">
            <a href="searchAgent.php" class="nav-button">Find Listing</a>
            <a href="searchListing.php" class="nav-button">List Your Home</a>
        </div>
    </header>
    <main>
        <h1>My Listings</h1>
        <?php include 'My_ListingsC.php'; ?>
        <div class="listings-container">
            <?php foreach ($userListings as $listing): ?>
                <div class="listing">
                    <h3><?php echo htmlspecialchars($listing['type']); ?></h3>
                    <p>Location: <?php echo htmlspecialchars($listing['location']); ?></p>
                    <p>Price: $<?php echo htmlspecialchars($listing['price']); ?></p>
                    <p>Rooms: <?php echo htmlspecialchars($listing['rooms']); ?></p>
                    <p>Size: <?php echo htmlspecialchars($listing['size']); ?> sqft</p>
                    <p>Region: <?php echo htmlspecialchars($listing['region']); ?></p>
                    <form method="post" action="">
                        <input type="hidden" name="listing_id" value="<?php echo $listing['listing_id']; ?>">
                        <button type="submit" name="delete">Delete</button>
                    </form>
                    <a href="EditListing.php?listing_id=<?php echo $listing['listing_id']; ?>">Edit</a>
                </div>
            <?php endforeach; ?>
        </div>
    </main>
</body>
</html>
