<?php
class Listing {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function createListing($location, $type, $price, $size, $rooms) {
        // Prepare the SQL query to insert a new listing
        $sql = "INSERT INTO listing (ra_id, location, type, price, size, rooms, views, shortlists) VALUES (?, ?, ?, ?, ?, ?, 0, 0)";
    
        $stmt = $this->conn->prepare($sql);
    
        // Get RA ID from session
        $ra_id = $_SESSION['ra_id'];
        
        // Bind parameters and execute the statement
        $stmt->bind_param("issiii", $ra_id, $location, $type, $price, $size, $rooms);
        if ($stmt->execute()) {
            return true; // Listing created successfully
        } else {
            return false; // Failed to create listing
        }
    }

    public function getListingsDetails($listing_id) {
        $sql = "SELECT * FROM listing WHERE listing_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $listing_id);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows == 1) {
            return $result->fetch_assoc();
        } else {
            // Handle the case where the listing is not found or multiple listings with the same ID exist
            return null;
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
        if ($result->num_rows == 1) {
        return $result->fetch_assoc();
        } else {
            // Handle the case where the listing is not found or multiple listings with the same ID exist
            return null;
        }
    }    

    public function getListingsByUserID($user_id) {
        $sql = "SELECT * FROM listing WHERE user_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $listings = array();
        while ($row = $result->fetch_assoc()) {
            $listings[] = $row;
        }
        return $listings;
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
        // Execute the query
        $result = $stmt->execute();
        
        // Check if the query was executed successfully
        if ($result) {
            $stmt->close();
            return true; // Return true to indicate success
        } else {
            $stmt->close();
            return false; // Return false to indicate failure
        }
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

    public function updateViewCount($listing_id) {
        $sql = "UPDATE listing SET views = views + 1 WHERE listing_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $listing_id);
        $stmt->execute();
        if ($stmt->affected_rows > 0) {
            return true; // Updated successfully
        } else {
            return false; // Failed to update
        }
    }

    public function searchListing($searchTerm = null) {
        // Base query to select listings
        $query = "SELECT * FROM listing WHERE 1";
    
        // Add conditions based on search term and filters
        if ($searchTerm) {
            $query .= " AND location LIKE '%$searchTerm%'";
        }
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

    //Shortlist methods
    public function createShortlist($listing_id, $user_id) {
        // Prepare SQL query to insert a new row into the shortlist table
        $sql = "INSERT INTO shortlist (listing_id, user_id) VALUES (?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ii", $listing_id, $user_id);
        
        // Execute the statement
        if ($stmt->execute()) {
            // Increment the shortlists count in the listings table
            $sql_update = "UPDATE listing SET shortlists = shortlists + 1 WHERE listing_id = ?";
            $stmt_update = $this->conn->prepare($sql_update);
            $stmt_update->bind_param("i", $listing_id);
            $stmt_update->execute();
            
            return true; // Shortlist created successfully
        } else {
            return false; // Failed to create shortlist
        }
    }
    
    public function removeFromShortlist($listing_id, $user_id) {
        // Prepare SQL query to delete the row from the shortlist table
        $sql = "DELETE FROM shortlist WHERE listing_id = ? AND user_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ii", $listing_id, $user_id);
        
        // Execute the statement
        if ($stmt->execute()) {
            // Decrement the shortlists count in the listings table
            $sql_update = "UPDATE listing SET shortlists = shortlists - 1 WHERE listing_id = ?";
            $stmt_update = $this->conn->prepare($sql_update);
            $stmt_update->bind_param("i", $listing_id);
            $stmt_update->execute();
            
            return true; // Shortlist removed successfully
        } else {
            return false; // Failed to remove from shortlist
        }
    }
    
    public function getShortlistedListings($user_id) {
        $sql = "SELECT * FROM listing INNER JOIN shortlist ON listing.listing_id = shortlist.listing_id WHERE shortlist.user_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $listings = array();
        while ($row = $result->fetch_assoc()) {
            $listings[] = $row;
        }
        return $listings;
    }
    

    public function isShortlistedByUser($user_id, $listing_id) {
        $sql = "SELECT * FROM shortlist WHERE user_id = ? AND listing_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ii", $user_id, $listing_id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->num_rows > 0;
    }

    public function calculateMortgage($data)
    {
        $interest_rate = $data['interest_rate'];
        $loan_tenure = $data['loan_tenure'];
        $loan_amount = $data['loan_amount'];
        $property_price = $data['property_price'];

        $monthly_interest_rate = ($interest_rate / 100) / 12;
        $loan_tenure_months = $loan_tenure * 12;

        $monthly_payment = ($loan_amount * $monthly_interest_rate * pow(1 + $monthly_interest_rate, $loan_tenure_months)) / (pow(1 + $monthly_interest_rate, $loan_tenure_months) - 1);
        $down_payment = $property_price - $loan_amount;

        return array('monthly_payment' => $monthly_payment, 'down_payment' => $down_payment);
    }
}
?>
