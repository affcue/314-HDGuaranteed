<?php
session_start();
if (!isset($_SESSION['ra_id'])) {
    header("Location: ra_login.php");
    exit();
}

require_once('../../Database/db_conn.php');
require_once('../../Control/ra/edit_listing_controller.php');

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['listing_id'])) {
    $listing_id = $_GET['listing_id'];
    
    $editListingController = new EditListingController($conn);
    $listing = $editListingController->getListingDetails($listing_id);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $listing_id = $_POST['listing_id'];
    $location = $_POST['location'];
    $type = $_POST['type'];
    $price = $_POST['price'];
    $size = $_POST['size'];
    $rooms = $_POST['rooms'];
    
    $editListingController = new EditListingController($conn);
    $success = $editListingController->editListing($listing_id, $location, $type, $price, $size, $rooms);
    
    if ($success) {
        $_SESSION['notification'] = "Listing edited successfully!";
        header("Location: ../../Boundary/ra/my_listings.php");
        exit();
    } else {
        $error_message = "Failed to edit listing.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Edit Listing</title>
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
<style>
    body {
        font-family: 'Roboto', sans-serif;
        background-color: #f2f2f2;
        margin: 0;
        padding: 0;
    }

    .container {
        max-width: 800px;
        margin: 0 auto;
        padding: 20px;
    }

    .title {
        margin-left: 20px;
    }

    form {
        margin-top: 20px;
    }

    label {
        display: block;
        margin-bottom: 10px;
    }

    input[type="text"], input[type="number"], select {
        width: 100%;
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 5px;
        box-sizing: border-box;
        margin-bottom: 10px;
    }

    input[type="submit"] {
        background-color: #007bff;
        color: #fff;
        border: none;
        border-radius: 5px;
        padding: 10px 20px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    input[type="submit"]:hover {
        background-color: #0056b3;
    }

    .back-button {
        background-color: #ccc;
        color: #000;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s ease;
        text-decoration: none;
        display: inline-block;
    }

    .back-button:hover {
        background-color: #999;
    }
</style>
</head>
<body>
<?php include 'header.php'?>

<div class="container">
    <h2 class="title">Edit Listing</h2>
    <a href="my_listings.php" class="back-button">Back to My Listings</a>
    <form action="" method="POST">
        <input type="hidden" name="listing_id" value="<?php echo $listing['listing_id']; ?>">
        <label for="location">Location:</label>
        <input type="text" id="location" name="location" value="<?php echo $listing['location']; ?>" required>
        <label for="type">Type:</label>
        <select id="type" name="type" required>
            <option value="Condominium" <?php echo ($listing['type'] == 'Condominium') ? 'selected' : ''; ?>>Condominium</option>
            <option value="Landed Property" <?php echo ($listing['type'] == 'Landed Property') ? 'selected' : ''; ?>>Landed Property</option>
            <option value="HDB Flat" <?php echo ($listing['type'] == 'HDB Flat') ? 'selected' : ''; ?>>HDB Flat</option>
        </select>
        <label for="price">Price:</label>
        <input type="number" id="price" name="price" value="<?php echo $listing['price']; ?>" required>
        <label for="size">Size:</label>
        <input type="number" id="size" name="size" value="<?php echo $listing['size']; ?>" required>
        <label for="rooms">Rooms:</label>
        <input type="number" id="rooms" name="rooms" value="<?php echo $listing['rooms']; ?>" required>
        <input type="submit" name="submit" value="Save Changes">
    </form>
    <?php if (isset($error_message)): ?>
    <p><?php echo $error_message; ?></p>
    <?php endif; ?>
</div>

</body>
</html>
