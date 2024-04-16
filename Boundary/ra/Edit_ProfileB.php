<!-- Edit_ProfileB.php-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <a href="raHome.php" class="nav-button left">Home</a>
        <div class="nav-buttons right">
            <a href="searchAgent.php" class="nav-button">Find Listing</a>
            <a href="searchListing.php" class="nav-button">List Your Home</a>
        </div>
    </header>
    <main>
        <h1>Edit Profile</h1>
        <?php include 'ProfileController.php'; // Include this to handle profile fetching and form submission ?>
        <form method="POST" action="">
            <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">

            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($userData['name']); ?>">

            <label for="description">Description:</label>
            <textarea id="description" name="description"><?php echo htmlspecialchars($userData['description']); ?></textarea>

            <label for="email">E-mail:</label>
            <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($userData['email']); ?>">

            <label for="contact">Contact:</label>
            <input type="text" id="contact" name="contact" value="<?php echo htmlspecialchars($userData['contact']); ?>">

            <input type="submit" value="Save changes">
        </form>
    </main>
</body>
</html>
