<?php
class Listing {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function createListing($location, $type, $price, $size, $rooms) {
        // Prepare the SQL query to insert a new listing
        $sql = "INSERT INTO listing (ra_id, location, type, price, size, rooms) VALUES (?, ?, ?, ?, ?, ?)";
    
        $stmt = $this->conn->prepare($sql);
        if (!$stmt) {
            echo "Error preparing statement: " . $this->conn->error;
            return false;
        }
    
        // Get RA ID from session
        $ra_id = $_SESSION['ra_id'];
        
        // Bind parameters and execute the statement
        $stmt->bind_param("issiii", $ra_id, $location, $type, $price, $size, $rooms);
        if ($stmt->execute()) {
            return true; // Listing created successfully
        } else {
            // Handle errors
            echo "Error executing statement: " . $stmt->error;
            return false; // Failed to create listing
        }
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

    public function deleteListing($listing_id) {
        $sql = "DELETE FROM listing WHERE listing_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $listing_id);
        
        if ($stmt->execute()) {
            return true; // Listing deleted successfully
        } else {
            // Handle errors
            return false; // Failed to delete listing
        }
    }
}
?>
