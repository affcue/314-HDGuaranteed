<?php
// RAEntity.php

require_once("db_connection.php");

class RAEntity
{
    private $conn;

    public function __construct()
    {
        $dbConnection = new DBConnection();
        $this->conn = $dbConnection->getConnection();
    }

    public function fetchRAData()
    {
        $sql = "SELECT * FROM ra";
        $result = mysqli_query($this->conn, $sql);

        if (!$result) {
            die("Error fetching RA data: " . mysqli_error($this->conn));
        }

        $raData = array();

        while ($row = mysqli_fetch_assoc($result)) {
            $raData[] = $row;
        }

        return $raData;
    }

    // Additional methods for RAEntity can be added here
}
?>
