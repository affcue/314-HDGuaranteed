<?php

// Include db_conn.php
require_once("../../Database/db_conn.php");

class BuyerSellerEntity
{
    private $conn;

    public function __construct()
    {
        global $conn; // Access the $conn variable from db_conn.php
        $this->conn = $conn;
    }

    public function fetchBuyerSellerData($search_query = null)
    {
        $sql = "SELECT user_id, name, `e-mail` AS email, contact FROM user";

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

        if (!$result) {
            // Error handling
            return null;
        }

        $adminData = array();

        while ($row = $result->fetch_assoc()) {
            $buyersellerData[] = $row;
        }

        $stmt->close();

        return $buyersellerData;
    }

    public function fetchBuyerSellerByName($buyersellerName)
    {
        $sql = "SELECT user_id, name, email, contact FROM user WHERE name = ?";

        $stmt = $this->conn->prepare($sql);

        if (!$stmt) {
            // Error handling
            return null;
        }

        $stmt->bind_param("s", $buyersellerName);

        $stmt->execute();

        $result = $stmt->get_result();

        if (!$result) {
            // Error handling
            return null;
        }

        $buyerseller = $result->fetch_assoc();

        $stmt->close();

        return $buyerseller;
    }
}

?>
