<?php
require_once("../../Database/db_conn.php");
class Rating
{
    private $conn;

    public function __construct()
    {
        
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
}
?>
