<?php
require_once("../../Database/db_conn.php");

class SellerEntity {
    private $conn;
    private $table_name = "user";

    public function __construct($db) {
        $this->conn = $db;
    }

    public function validateLogin($username, $password) {
        $query = "SELECT * FROM " . $this->table_name . " WHERE username = ? AND password = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("ss", $username, $password);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();

        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            if ($row['purpose'] == 'seller') {
                return $row['user_id'];
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
}
?>
