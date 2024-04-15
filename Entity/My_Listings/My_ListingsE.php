<?php
class ListingManager {
    private $dbConnection;

    public function __construct($db) {
        $this->dbConnection = $db;
    }

    public function fetchAllListingsByAgent($agentId) { // Retrieve all listings for a given agent
        $query = "SELECT * FROM listing WHERE ra_id = ?";
        $stmt = $this->dbConnection->prepare($query);
        $stmt->bind_param("i", $agentId);
        $stmt->execute();
        $result = $stmt->get_result();
        $listings = [];
        while ($row = $result->fetch_assoc()) {
            $listings[] = $row;
        }
        return $listings;
    }
    public function deleteListing($listingId) {
        $query = "DELETE FROM listing WHERE listing_id = ?";
        $stmt = $this->dbConnection->prepare($query);
        $stmt->bind_param("i", $listingId);
        $stmt->execute();
        return $stmt->affected_rows > 0;
    }
}
