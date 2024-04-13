<?php
class searchListingE {
    private $conn;

    public function __construct(mysqli $conn) {
        $this->conn = $conn;
    }

    public function searchListings($searchTerm, $region, $propertyType) {
        // Construct SQL query
        $sql = "SELECT * FROM listing WHERE 1=1";

        if (!empty($searchTerm)) {
            $sql .= " AND (location LIKE '%$searchTerm%' OR type LIKE '%$searchTerm%')";
        }
        if (!empty($region)) {
            $sql .= " AND region = '$region'";
        }
        if (!empty($propertyType)) {
            $sql .= " AND type = '$propertyType'";
        }

        // Execute query
        $result = $this->conn->query($sql);

        // Fetch listings
        $listings = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $listings[] = $row;
            }
        }

        return $listings;
    }
}
?>
