<?php
class Rating
{
    private $conn;

    public function __construct()
    {
        // Include the DB connection file
        require_once("../../Database/db_conn.php");

        // Get the database connection
        global $conn;
        $this->conn = $conn;
    }

    public function addRating($raId, $userId, $stars, $description)
    {
        $query = "INSERT INTO rating (ra_id, user_id, stars, description) VALUES (?, ?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('iiis', $raId, $userId, $stars, $description);
        $stmt->execute();
        $stmt->close();
    }

    // SellerEntity class
    private $sellerEntity;

    public function validateSellerLogin($username, $password)
    {
        // Create an instance of SellerEntity
        $this->sellerEntity = new SellerEntity($this->conn);

        // Validate login credentials using SellerEntity
        return $this->sellerEntity->validateLogin($username, $password);
    }
}

class SellerEntity {
    // Database connection and table name
    private $conn;
    private $table_name = "user";

    // Constructor with $db as database connection
    public function __construct($db) {
        $this->conn = $db; // Assign the database connection to the private variable
    }

    // Validate login credentials
    public function validateLogin($username, $password) {
        $query = "SELECT * FROM " . $this->table_name . " WHERE username = ? AND password = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("ss", $username, $password);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();

        if ($result->num_rows == 1) {
            return true; // Username and password match
        } else {
            return false; // Username and password do not match
        }
    }
}
?>
