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

    public function getListingByListingID($listing_id) {
        $sql = "SELECT * FROM listing WHERE listing_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $listing_id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }    
    
    public function getAllListings() {
        $sql = "SELECT * FROM listing";
        $result = $this->conn->query($sql);

        if ($result->num_rows > 0) {
            $listings = [];
            while ($row = $result->fetch_assoc()) {
                $listings[] = $row;
            }
            return $listings;
        } else {
            return [];
        }
    }

    public function editListing($listing_id, $location, $type, $price, $size, $rooms) {
        $sql = "UPDATE listing SET location = ?, type = ?, price = ?, size = ?, rooms = ? WHERE listing_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ssdiii", $location, $type, $price, $size, $rooms, $listing_id);
        return $stmt->execute();
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

    public function searchListing($searchTerm = null, $region = null, $propertyType = null) {
        // Debugging code to verify the type of $this->conn
        if (!$this->conn instanceof mysqli) {
            throw new Exception("Invalid database connection object.");
        }
    
        // Base query to select listings
        $query = "SELECT * FROM listing WHERE 1";
    
        // Add conditions based on search term and filters
        if ($searchTerm) {
            $query .= " AND location LIKE '%$searchTerm%'";
        }
        /*
        if ($region) {
            $query .= " AND region = '$region'";
        }
        if ($propertyType) {
            $query .= " AND type = '$propertyType'";
        }
        */
        // Execute the query using the provided connection
        $result = $this->conn->query($query);

        // Debugging: Echo the generated SQL query
        //echo "Generated SQL query: $query<br>";

        // Check if query was successful
        if ($result && $result->num_rows > 0) {
            // Fetch data into an array
            $listings = $result->fetch_all(MYSQLI_ASSOC);
            echo "Number of listings found: " . count($listings) . "<br>";
            return $listings;
        } else {
            // Handle error or return empty array if no results found
            echo "No listings found.<br>";
            return array();
        }
    }
}
?>
