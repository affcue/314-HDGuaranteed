<?php

require_once("../../Database/config.php");

class RARatingEntity
{
    private $conn;

    public function __construct()
    {
        // Create a new instance of the DBConnection class
        $dbConnection = new DBConnection();
        // Get the database connection
        $this->conn = $dbConnection->getConnection();
    }

    public function addRating($raId, $userId, $stars, $description)
    {
        $query = "INSERT INTO rating (ra_id, user_id, stars, description) VALUES (?, ?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('iiis', $raId, $userId, $stars, $description);
        $stmt->execute();
        $stmt->close();
    }
}

?>
