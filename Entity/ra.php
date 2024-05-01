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
}
?>
