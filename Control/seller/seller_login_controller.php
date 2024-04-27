<?php
session_start(); // Start the session

include('../../Database/db_conn.php');
include('../../Entity/rating.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['username']) && isset($_POST['password'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $sellerEntity = new SellerEntity($conn);

        $user_id = $sellerEntity->validateLogin($username, $password);

        if ($user_id) {
            // Store user_id and username in session
            $_SESSION['user_id'] = $user_id;
            $_SESSION['username'] = $username;
            header("Location: ../../Boundary/seller/seller_home.php");
            exit();
        } else {
            $_SESSION['login_error'] = "Invalid username or password";
            header("Location: ../../Boundary/seller/seller_login_boundary.php");
            exit();
        }
    } else {
        header("Location: ../../Boundary/seller/seller_login_boundary.php");
        exit();
    }
} else {
    header("Location: ../../Boundary/seller/seller_login_boundary.php");
    exit();
}
?>
