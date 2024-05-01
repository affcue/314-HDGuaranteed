<?php
$servername = "127.0.0.1:3307";
$username = "root";
$password = ""; 
$dbname = "314hdguaranteed";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

/*
FQ's personal login
$servername = "127.0.0.1:3307";
$username = "root";
$password = ""; 
$dbname = "314hdguaranteed";

General login
$servername = "localhost";
$username = "root";
$password = ""; 
$dbname = "314hdguaranteed";
*/
?>
