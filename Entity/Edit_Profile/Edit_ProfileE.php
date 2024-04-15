<?php
class UserProfile {
    private $dbConnection;

    public function __construct($db) {
        $this->dbConnection = $db;
    }

    public function getUserProfile($raId) {
        // SQL query to get user profile
        $query = "SELECT name, description, `e-mail` as email, contact FROM user WHERE ra_id = ?";
        $stmt = $this->dbConnection->prepare($query);
        $stmt->bind_param("i", $raId);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function updateUserProfile($raId, $name, $description, $email, $contact) {
        // SQL query to update user profile
        $query = "UPDATE user SET name = ?, description = ?, `e-mail` = ?, contact = ? WHERE ra_id = ?";
        $stmt = $this->dbConnection->prepare($query);
        $stmt->bind_param("ssssi", $name, $description, $email, $contact, $raId);
        $stmt->execute();
    }
}
?>