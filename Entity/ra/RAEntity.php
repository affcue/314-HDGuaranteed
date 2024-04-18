<?php
// RAEntity.php

require_once("config.php");

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

    


    // Additional methods for RAEntity can be added here
}
?>
