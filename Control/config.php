<?php
// Database connection parameters
//change your servername, username and password as necessary for testing. 
//Do not push your editted username and password to GitHub
//Feel free to leave a commented statement with your login for testing

/*
$servername = "localhost";
$username = "your_username";
$password = "your_password"; 
$dbname = "314hdguaranteed";
*/

$servername = "localhost";
$username = "root";
$password = ""; 
$dbname = "314hdguaranteed";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}   
?>
