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
   
    public function searchUser($searchTerm = null) {
        // Base query to select users
        $query = "SELECT * FROM user WHERE 1";
    
        // Add conditions based on search term
        if ($searchTerm) {
            $query .= " AND username LIKE '%$searchTerm%'";
        }
    
        // Execute the query using the provided connection
        $result = $this->conn->query($query);
    
        // Check if query was successful
        if ($result && $result->num_rows > 0) {
            // Fetch data into an array
            $users = $result->fetch_all(MYSQLI_ASSOC);
            echo "Number of users found: " . count($users) . "<br>";
            return $users;
        } else {
            // Handle error or return empty array if no results found
            echo "No users found.<br>";
            return array();
        }
    }

    public function getAllUsers() {
        $sql = "SELECT * FROM user";
        $result = $this->conn->query($sql);
    
        if ($result->num_rows > 0) {
            $users = [];
            while ($row = $result->fetch_assoc()) {
                $users[] = $row;
            }
            return $users;
        } else {
            return [];
        }
    }
    
    public function getUserByID($user_id) {
        $sql = "SELECT * FROM user WHERE user_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows == 1) {
            return $result->fetch_assoc();
        } else {
            // Handle the case where the user is not found or multiple users with the same ID exist
            return null;
        }
    }

    public function updateUser($user_id, $username, $password) {
        $sql = "UPDATE user SET username = ?, password = ? WHERE user_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ssi", $username, $password, $user_id);
        if($stmt->execute()) {
            // Return true if update is successful
            return true;
        } else {
            // Return false if update fails
            return false;
        }
    }
    
    public function deleteUser($user_id) {
        $sql = "DELETE FROM user WHERE user_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $user_id);
        if($stmt->execute()) {
            // Return true if deletion is successful
            return true;
        } else {
            // Return false if deletion fails
            return false;
        }
    }
}
?>