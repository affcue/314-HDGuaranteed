<?php

// Include db_conn.php
require_once("../../Database/db_conn.php");

class AdminEntity
{
    private $conn;

    public function __construct()
    {
        global $conn; // Access the $conn variable from db_conn.php
        $this->conn = $conn;
    }

    public function fetchAdminData($search_query = null)
    {
        $sql = "SELECT admin_id, name, `e-mail` AS email, contact FROM admin";

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
            $adminData[] = $row;
        }

        $stmt->close();

        return $adminData;
    }

    public function fetchAdminByName($adminName)
    {
        $sql = "SELECT admin_id, name, email, contact FROM admin WHERE name = ?";

        $stmt = $this->conn->prepare($sql);

        if (!$stmt) {
            // Error handling
            return null;
        }

        $stmt->bind_param("s", $adminName);

        $stmt->execute();

        $result = $stmt->get_result();

        if (!$result) {
            // Error handling
            return null;
        }

        $admin = $result->fetch_assoc();

        $stmt->close();

        return $admin;
    }
}

?>
