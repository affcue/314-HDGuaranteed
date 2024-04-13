<?php
// Database credentials
$host = 'localhost'; // Adjust if MySQL is running on a different host or port
$username = 'root'; // Replace with your MySQL username
$password = ''; // Replace with your MySQL password
$database = '314hdguaranteed'; // Replace with your MySQL database name

// Attempt to establish a connection to the database
$conn = mysqli_connect($host, $username, $password, $database);

// Check if the connection was successful
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Insert data into the listing table
$sql = "INSERT INTO listing (region, type, price, size, rooms, views, shortlists) VALUES ('West', 'HDB', 750000, 990, 3, 101, 'no')";

if (mysqli_query($conn, $sql)) {
    echo "New record inserted successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}


$sql2 = "INSERT INTO listing (region, type, price, size, rooms, views, shortlists) VALUES ('North', 'Condo', 4100000, 1000, 4, 130, 'yes')";

if (mysqli_query($conn, $sql2)) {
    echo "Second record inserted successfully";
} else {
    echo "Error: " . $sql2 . "<br>" . mysqli_error($conn);
}
$sql2 = "INSERT INTO listing (region, type, price, size, rooms, views, shortlists) VALUES ('North', 'Condo', 4100000, 1000, 4, 130, 'yes')";

if (mysqli_query($conn, $sql2)) {
    echo "Second record inserted successfully";
} else {
    echo "Error: " . $sql2 . "<br>" . mysqli_error($conn);
}
// Close the database connection
mysqli_close($conn);
?>
