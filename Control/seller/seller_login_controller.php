<?php
require_once("../../Database/db_conn.php"); // Include the database connection file

require_once("../../Entity/rating.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve username and password from the form
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Create an instance of SellerEntity
    $sellerEntity = new SellerEntity($conn); // Pass the database connection as an argument

    // Validate login credentials
    $loginResult = $sellerEntity->validateLogin($username, $password);

    if ($loginResult) {
        // Redirect to the seller home page if login is successful
        header("Location: ../../Boundary/seller/sellerHome.php");
        exit();
    } else {
        // Display an error message if login fails
        echo "Invalid username or password";
    }
}
?>
