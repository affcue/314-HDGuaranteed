<?php

class User {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function createUser($email, $username, $password, $name, $contact, $purpose) {
        // Prepare and execute the SQL query to insert a new user into the database
        $stmt = $this->conn->prepare("INSERT INTO `user` (`e-mail`, `username`, `password`, `name`, `contact`, `purpose`) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssis", $email, $username, $password, $name, $contact, $purpose);
        
        // Check if the query executed successfully
        if ($stmt->execute()) {
            // User created successfully
            return true;
        } else {
            // Error occurred while creating user
            return false;
        }
    }
}

?>
