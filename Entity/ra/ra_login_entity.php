<?php
// ra_login_entity.php

class RA_Login_Entity {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function verifyLogin($username, $password) {
        $ra_id = null; // Initialize $ra_id to null

        $stmt = $this->db->prepare("SELECT ra_id FROM ra WHERE username = ? AND password = ?");
        $stmt->bind_param("ss", $username, $password);
        $stmt->execute();
        $stmt->bind_result($ra_id);
        $stmt->fetch();
        $stmt->close();

        if (isset($ra_id)) {
            return $ra_id;
        } else {
            return false;
        }
    }
}
?>
