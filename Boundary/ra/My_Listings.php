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
    <!-- Left-aligned 'Edit Profile' button -->
    <a href="raHome.php" class="nav-button left">Home</a>
    
    <!-- Right-aligned 'Find Listing', 'Find Agent', and 'Logout' buttons -->
    <div class="nav-buttons right">
        <a href="searchAgent.php" class="nav-button">Find Listing</a>
        <a href="searchListing.php" class="nav-button">Find Agent</a>
        <a href="logout.php" class="nav-button">Logout</a>
    </div>
</header>

<main>
    <h1>My Listings</h1>
    <button class="create-button">Create New Listing +</button>
    <section class="listing-container">
        <div class="listing">
            <span>Listing location | Property.Type | Price | Floor.Size | No.of.rooms | Views | Currently Shortlisted</span>
            <div class="listing-actions">
                <button class="edit-button">Edit</button>
                <button class="delete-button">Delete</button>
            </div>
        </div>
        <div class="listing">
            <span>Listing location | Property.Type | Price | Floor.Size | No.of.rooms | Views | Currently Shortlisted</span>
            <div class="listing-actions">
                <button class="edit-button">Edit</button>
                <button class="delete-button">Delete</button>
            </div>
        </div>
        <div class="listing">
            <span>Listing location | Property.Type | Price | Floor.Size | No.of.rooms | Views | Currently Shortlisted</span>
            <div class="listing-actions">
                <button class="edit-button">Edit</button>
                <button class="delete-button">Delete</button>
            </div>
        </div>
    </section>
</main>

</body>
</html>
