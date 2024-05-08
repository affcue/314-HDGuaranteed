<?php
class RA {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function editProfile($ra_id, $email, $username, $password, $name, $contact, $description) {
        $sql = "UPDATE ra SET `e-mail` = ?, username = ?, password = ?, name = ?, contact = ?, description = ? WHERE ra_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ssssisi", $email, $username, $password, $name, $contact, $description, $ra_id);
        $stmt->execute();
        $stmt->close();
    }

    public function getProfileDetails($ra_id) {
        $sql = "SELECT * FROM ra WHERE ra_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $ra_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $stmt->close();
        return $row;
    }

    public function searchRA($searchTerm = null) {
        // Base query to select RA
        $query = "SELECT * FROM ra WHERE 1";

        // Add conditions based on search term
        if ($searchTerm) {
            $query .= " AND name LIKE '%$searchTerm%'";
        }

        // Execute the query using the provided connection
        $result = $this->conn->query($query);

        // Check if query was successful
        if ($result && $result->num_rows > 0) {
            // Fetch data into an array
            $ras = $result->fetch_all(MYSQLI_ASSOC);
            echo "Number of RA found: " . count($ras) . "<br>";
            return $ras;
        } else {
            // Handle error or return empty array if no results found
            echo "No RA found.<br>";
            return array();
        }
    }

    public function getAllRA() {
        $sql = "SELECT * FROM ra";
        $result = $this->conn->query($sql);

        if ($result->num_rows > 0) {
            $ras = [];
            while ($row = $result->fetch_assoc()) {
                $ras[] = $row;
            }
            return $ras;
        } else {
            return [];
        }
    }

    public function getRAByRAID($ra_id) {
        $sql = "SELECT * FROM ra WHERE ra_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $ra_id);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows == 1) {
            return $result->fetch_assoc();
        } else {
            // Handle the case where the RA is not found or multiple RAs with the same ID exist
            return null;
        }
    }
    

    //Old code
    public function fetchRAData($search_query = null)
    {
        $sql = "SELECT * FROM ra";

        if ($search_query) {
            $sql .= " WHERE name LIKE ?";
            $search_query = "%" . $search_query . "%";
        }

        $stmt = $this->conn->prepare($sql);

        if ($search_query) {
            $stmt->bind_param('s', $search_query);
        }

        $stmt->execute();

        $result = $stmt->get_result();

        $raData = array();

        while ($row = $result->fetch_assoc()) {
            $raData[] = $row;
        }

        return $raData;
    }

    public function fetchAgentByName($agentName)
    {
        $sql = "SELECT * FROM ra WHERE name = ?";

        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("s", $agentName);

        $stmt->execute();

        $result = $stmt->get_result();

        $agent = $result->fetch_assoc();

        $stmt->close();

        return $agent;
    }

    public function fetchAgentReviews($raId)
    {
        $sql = "SELECT description, user_id, stars FROM rating WHERE ra_id = ?";

        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $raId);

        $stmt->execute();

        $result = $stmt->get_result();

        $reviews = array();
        while ($row = $result->fetch_assoc()) {
            $reviews[] = $row;
        }

        $stmt->close();

        return $reviews;
    }
}

?>
