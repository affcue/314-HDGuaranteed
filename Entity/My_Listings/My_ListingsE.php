<?php
class ListingManager {
    private $dbConnection; // Database connection

    public function __construct($db) { // Constructor to set up the database connection
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

    public function addListing($data) { // Add a new listing
        $query = "INSERT INTO listing (ra_id, user_id, region, type, location, postal, price, rooms, size, views, shortlists) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->dbConnection->prepare($query);
        $stmt->bind_param("iisssiiiiii", $data['ra_id'], $data['user_id'], $data['region'], $data['type'], $data['location'], $data['postal'], $data['price'], $data['rooms'], $data['size'], $data['views'], $data['shortlists']);
        $stmt->execute();
        return $stmt->affected_rows > 0;
    }

    public function updateListing($listingId, $data) { // Update an existing listing
        $query = "UPDATE listing SET region = ?, type = ?, location = ?, postal = ?, price = ?, rooms = ?, size = ?, views = ?, shortlists = ? WHERE listing_id = ?";
        $stmt = $this->dbConnection->prepare($query);
        $stmt->bind_param("sssiisiiii", $data['region'], $data['type'], $data['location'], $data['postal'], $data['price'], $data['rooms'], $data['size'], $data['views'], $data['shortlists'], $listingId);
        $stmt->execute();
        return $stmt->affected_rows > 0;
    }

    public function deleteListing($listingId) { // Delete a listing
        $query = "DELETE FROM listing WHERE listing_id = ?";
        $stmt = $this->dbConnection->prepare($query);
        $stmt->bind_param("i", $listingId);
        $stmt->execute();
        return $stmt->affected_rows > 0;
    }
}
?>