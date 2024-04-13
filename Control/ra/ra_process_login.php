<?php
// Include the database connection file
include 'db_connection.php';

// Fetch username and password from the form
$user = $_POST['username'];
$pass = $_POST['password'];

// Hash the password using PHP's built-in password_hash function
$hashed_password = password_hash($pass, PASSWORD_DEFAULT);

// SQL query to check if the provided username exists in the database
$sql = "SELECT * FROM ra WHERE username='$user'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // User found, verify the password
    $row = $result->fetch_assoc();
    if (password_verify($pass, $row['password'])) {
        // Password is correct, login successful
        // Redirect the user to ra_home.html
        header("Location: ../../Boundary/ra/raHome.php");
        exit();
    } else {
        // Password is incorrect
        echo "Invalid password";
    }
} else {
    // Username does not exist
    echo "Invalid username";
}

// Close connection (optional)
$conn->close();
?>

