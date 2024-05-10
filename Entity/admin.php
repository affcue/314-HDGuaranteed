<?php
class Admin {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function createAdmin($email, $username, $password, $name, $contact) {
        // Prepare and execute the SQL query to insert a new admin into the database
        $stmt = $this->conn->prepare("INSERT INTO `admin` (`e-mail`, `username`, `password`, `name`, `contact`) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $email, $username, $password, $name, $contact);
        
        // Check if the query executed successfully
        if ($stmt->execute()) {
            // Admin created successfully
            return true;
        } else {
            // Error occurred while creating admin
            return false;
        }
    }
    public function searchAdmin($searchTerm = null) {
        // Base query to select admins
        $query = "SELECT * FROM admin WHERE 1";

        // Add conditions based on search term
        if ($searchTerm) {
            $query .= " AND username LIKE '%$searchTerm%'";
        }

        // Execute the query using the provided connection
        $result = $this->conn->query($query);

        // Check if query was successful
        if ($result && $result->num_rows > 0) {
            // Fetch data into an array
            $admins = $result->fetch_all(MYSQLI_ASSOC);
            echo "Number of admins found: " . count($admins) . "<br>";
            return $admins;
        } else {
            // Handle error or return empty array if no results found
            echo "No admin found.<br>";
            return array();
        }
    }

    public function getAllAdmins() {
        $sql = "SELECT * FROM admin";
        $result = $this->conn->query($sql);

        if ($result->num_rows > 0) {
            $admins = [];
            while ($row = $result->fetch_assoc()) {
                $admins[] = $row;
            }
            return $admins;
        } else {
            return [];
        }
    }

    public function getAdminByAdminID($admin_id) {
        $sql = "SELECT * FROM admin WHERE admin_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $admin_id);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows == 1) {
            return $result->fetch_assoc();
        } else {
            // Handle the case where the admin is not found or multiple admins with the same ID exist
            return null;
        }
    }

    public function updateAdmin($admin_id, $username, $password) {
        $sql = "UPDATE admin SET username = ?, password = ? WHERE admin_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ssi", $username, $password, $admin_id);
        $result = $stmt->execute();
        $stmt->close();
        return $result;
    }
    
    public function deleteAdmin($admin_id) {
        $sql = "DELETE FROM admin WHERE admin_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $admin_id);
        if ($stmt->execute()) {
            // Delete successful
            return true;
        } else {
            // Delete failed
            return false;
        }
    }
    
}
?>
