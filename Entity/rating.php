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

    public function getRatingsByRAID($ra_id) {
        $sql = "SELECT * FROM rating WHERE ra_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $ra_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $ratings = array();
        while ($row = $result->fetch_assoc()) {
            $ratings[] = $row;
        }
        return $ratings;
    }

    public function getRatingByUserIDAndRAID($user_id, $ra_id) {
        $sql = "SELECT * FROM rating WHERE user_id = ? AND ra_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ii", $user_id, $ra_id);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
        } else {
            return null;
        }
    }

    public function deleteRating($rating_id) {
        $sql = "DELETE FROM rating WHERE rating_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $rating_id);
        return $stmt->execute();
    }

    public function addRating($user_id, $ra_id, $stars, $description) {
        $sql = "INSERT INTO rating (ra_id, user_id, stars, description) VALUES (?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("iiis", $ra_id, $user_id, $stars, $description);
        return $stmt->execute();
    }
}
?>
