<?php
class ListingEntity {
    private $db_server = "localhost";
    private $db_user = "root";
    private $db_pass = ""; // Update this with your database password
    private $db_name = "314hdguaranteed";
    private $conn;

    function __construct() {
        try {
            $this->conn = new mysqli($this->db_server, $this->db_user, $this->db_pass, $this->db_name);
            if ($this->conn->connect_error) {
                die("Connection failed: " . $this->conn->connect_error);
            }
        } catch(mysqli_sql_exception $e) {
            echo "You are not connected";
        }
    }

    function searchListings($searchTerm, $region = null, $propertyType = null) {
        $sql = "SELECT * FROM listing WHERE 1=1"; // Start with a true condition
        if ($searchTerm) {
            $sql .= " AND (location LIKE '%$searchTerm%' OR type LIKE '%$searchTerm%')";
        }
        if ($region) {
            $sql .= " AND region = '$region'";
        }
        if ($propertyType) {
            $sql .= " AND type = '$propertyType'";
        }
        $result = $this->conn->query($sql);

        $listings = array();
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $listings[] = $row;
            }
        }
        return $listings;
    }

    function displayListings($listings) {
        $output = "<table border='1'>";
        $output .= "<tr>
                        <th>Listing location</th>
                        <th>Property type</th>
                        <th>Price</th>
                        <th>Floor size</th>
                        <th>No. of rooms</th>
                        <th>Views</th>
                        <th>Currently shortlisted</th>
                        <th>Action</th>
                    </tr>";
        if (!empty($listings)) {
            foreach ($listings as $row) {
                $output .= "<tr>
                                <td>{$row['location']}</td>
                                <td>{$row['type']}</td>
                                <td>$" . number_format($row["price"]) . "</td>
                                <td>{$row['size']} sqf</td>
                                <td>{$row['rooms']}</td>
                                <td>{$row['views']}</td>
                                <td>{$row['shortlists']}</td>
                                <td><a href='viewlistingB.php?id={$row['listing_id']}'>View</a></td>
                            </tr>";
            }
        } else {
            $output .= "<tr><td colspan='8'>0 results found</td></tr>";
        }
        $output .= "</table>";
        return $output;
    }

    function __destruct() {
        $this->conn->close();
    }
}
?>
