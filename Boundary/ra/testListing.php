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
$sql = "INSERT INTO listing (region, type, location, postal, price, rooms, size,  views, shortlists) VALUES ('West', 'HDB Flat', 'Clementi', 453893, 750000, 3, 1600, 101, 'no')";

if (mysqli_query($conn, $sql)) {
    echo "New record inserted successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}


$sql2 = "INSERT INTO listing (region, type, location, postal, price, rooms, size, views, shortlists) VALUES ('North', 'Condominium', 'Woodlands', 123456, 4100000, 4, 1300, 120, 'yes')";

if (mysqli_query($conn, $sql2)) {
    echo "Second record inserted successfully";
} else {
    echo "Error: " . $sql2 . "<br>" . mysqli_error($conn);
}

$sql3 = "INSERT INTO listing (region, type, location, postal, price, rooms, size, views, shortlists) VALUES ('East', 'Landed Property', 'Bedok', 696420, 21000000, 9, 20000, 150, 'yes')";

if (mysqli_query($conn, $sql3)) {
    echo "Second record inserted successfully";
} else {
    echo "Error: " . $sql3 . "<br>" . mysqli_error($conn);
}

// Close the database connection
mysqli_close($conn);
//comment
?>
