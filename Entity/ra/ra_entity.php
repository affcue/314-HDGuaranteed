<?php

// Combined Entity
require_once("../../Database/config.php");


class RAEntity
{
    private $conn;

    public function __construct()
    {
        $dbConnection = new DBConnection();
        $this->conn = $dbConnection->getConnection();
    }

    public function fetchRAData($search_query = null)
    {
        $sql = "SELECT * FROM ra";

        if ($search_query) {
            $sql .= " WHERE name LIKE ?";
            $search_query = "%" . $search_query . "%";
        }

        $stmt = $this->conn->prepare($sql);

        if ($search_query) {
            $stmt->bind_param('s', $search_query);
        }

        $stmt->execute();

        $result = $stmt->get_result();

        $raData = array();

        while ($row = $result->fetch_assoc()) {
            $raData[] = $row;
        }

        return $raData;
    }

    public function fetchAgentByName($agentName)
    {
        $sql = "SELECT * FROM ra WHERE name = ?";

        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("s", $agentName);

        $stmt->execute();

        $result = $stmt->get_result();

        $agent = $result->fetch_assoc();

        $stmt->close();

        return $agent;
    }

    public function fetchAgentReviews($raId)
    {
        $sql = "SELECT description, user_id, stars FROM rating WHERE ra_id = ?";

        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $raId);

        $stmt->execute();

        $result = $stmt->get_result();

        $reviews = array();
        while ($row = $result->fetch_assoc()) {
            $reviews[] = $row;
        }

        $stmt->close();

        return $reviews;
    }
}

?>
