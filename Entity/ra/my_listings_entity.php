<?php
require_once('../../Database/db_conn.php');

class MyListingsEntity {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function getListingsByRAID($ra_id) {
        $sql = "SELECT * FROM listing WHERE ra_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $ra_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $listings = array();
        while ($row = $result->fetch_assoc()) {
            $listings[] = $row;
        }
        return $listings;
    }
}
?>
