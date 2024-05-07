<?php
class AdminLoginEntity {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function validateLogin($username, $password) {
        $sql = "SELECT admin_id FROM admin WHERE username = ? AND password = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ss", $username, $password);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            return $row['admin_id'];
        } else {
            return false;
        }
    }
}
?>
