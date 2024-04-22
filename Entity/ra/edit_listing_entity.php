<?php
class EditListingEntity {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function getListingDetails($listing_id) {
        $sql = "SELECT * FROM listing WHERE listing_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $listing_id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    public function editListing($listing_id, $location, $type, $price, $size, $rooms) {
        $sql = "UPDATE listing SET location = ?, type = ?, price = ?, size = ?, rooms = ? WHERE listing_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ssdiii", $location, $type, $price, $size, $rooms, $listing_id);
        return $stmt->execute();
    }
}
?>
