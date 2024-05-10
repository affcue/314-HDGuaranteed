<?php
session_start();
if (!isset($_SESSION['ra_id'])) {
    header("Location: ra_login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Create New Listing</title>
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
</style>
</head>
<body>
<?php include 'header.php';?>

<div class="container">
    <h2 class="title">Create New Listing</h2>
    <form action="../../Control/ra/create_listing_controller.php" method="POST">
        <label for="location">Location:</label>
        <input type="text" id="location" name="location" required>
        <label for="type">Type:</label>
        <select id="type" name="type" required>
            <option value="Condominium">Condominium</option>
            <option value="Landed Property">Landed Property</option>
            <option value="HDB Flat">HDB Flat</option>
        </select>
        <label for="price">Price:</label>
        <input type="number" id="price" name="price" required>
        <label for="size">Size:</label>
        <input type="number" id="size" name="size" required>
        <label for="rooms">Rooms:</label>
        <input type="number" id="rooms" name="rooms" required>
        <input type="submit" value="Create Listing">
    </form>
</div>

</body>
</html>
