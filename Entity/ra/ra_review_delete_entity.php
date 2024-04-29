<?php

require_once("../../Database/db_conn.php");

class ReviewDeleteEntity
{
    private $conn;

    public function __construct()
    {
        global $conn;
        $this->conn = $conn;
    }

    public function getUserReviews($userId)
    {
        // Get all reviews written by the user
        $query = "SELECT * FROM rating WHERE user_id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('i', $userId);
        $stmt->execute();
        $result = $stmt->get_result();
        $reviews = $result->fetch_all(MYSQLI_ASSOC);
        $stmt->close();
        return $reviews;
    }

    public function deleteReviews($reviewIds)
    {
        // Delete the selected reviews
        $placeholders = implode(',', array_fill(0, count($reviewIds), '?'));
        $query = "DELETE FROM rating WHERE rating_id IN ($placeholders)";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param(str_repeat('i', count($reviewIds)), ...$reviewIds);
        $stmt->execute();
        $stmt->close();
    }
}

?>
