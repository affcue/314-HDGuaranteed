<?php
class RALoginEntity {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function validateLogin($username, $password) {
        $sql = "SELECT ra_id FROM ra WHERE username = ? AND password = ? AND type = 'active'";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ss", $username, $password);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            return $row['ra_id'];
        } else {
            return null;
        }
    }
}
?>
