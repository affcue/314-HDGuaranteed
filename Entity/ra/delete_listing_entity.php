<?php
class DeleteListingEntity {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
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
