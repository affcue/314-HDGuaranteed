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

    public function searchUsers($searchTerm, $userType) {
        // Define the table name based on the user type
        $tableName = "";
        switch ($userType) {
            case "admin":
                $tableName = "admin";
                break;
            case "ra":
                $tableName = "ra";
                break;
            case "buyer":
            case "seller":
                $tableName = "user";
                break;
            default:
                // Invalid user type
                return array();
        }
    
        // Prepare and execute the SQL query to search users based on search term and user type
        $sql = "SELECT * FROM `$tableName` WHERE `e-mail` LIKE ? OR `username` LIKE ? OR `name` LIKE ?";
        $stmt = $this->conn->prepare($sql);
        $search = "%{$searchTerm}%";
        $stmt->bind_param("sss", $search, $search, $search);
        $stmt->execute();
        $result = $stmt->get_result();
    
        $users = array();
        while ($row = $result->fetch_assoc()) {
            $users[] = $row;
        }
    
        return $users;
    }
    
    
    
    
    
    
    
    
    
}
?>
