<?php
require_once(".php");

class ViewAgentEntity
{
    private $conn;

    public function __construct()
    {
        $dbConnection = new DBConnection();
        $this->conn = $dbConnection->getConnection();
    }

    public function fetchAgentByName($agentName)
    {
        // Prepare SQL statement to fetch agent by name
        $sql = "SELECT * FROM ra WHERE name = ?";

        // Prepare and bind parameters
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("s", $agentName);

        // Execute query
        $stmt->execute();

        // Get result
        $result = $stmt->get_result();

        // Fetch data
        $agent = $result->fetch_assoc();

        // Close statement
        $stmt->close();

        return $agent;
    }

    public function fetchAgentReviews($raId)
    {
        // Prepare SQL statement to fetch agent reviews by raId
        $sql = "SELECT description, user_id, stars FROM rating WHERE ra_id = ?";

        // Prepare and bind parameters
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $raId);

        // Execute query
        $stmt->execute();

        // Get result
        $result = $stmt->get_result();

        // Fetch data
        $reviews = array();
        while ($row = $result->fetch_assoc()) {
            $reviews[] = $row;
        }

        // Close statement
        $stmt->close();

        return $reviews;
    }
}


