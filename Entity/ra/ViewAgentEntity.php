<?php
require_once("db_connection.php");

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
}
?>