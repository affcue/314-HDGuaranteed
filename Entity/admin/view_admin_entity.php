<?php
require_once("../../Database/db_conn.php");

class AdminEntity
{
    private $conn;

    public function __construct()
    {
        global $servername, $username, $password, $dbname;
        $this->conn = new mysqli($servername, $username, $password, $dbname);

        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    public function fetchAdminById($adminId)
    {
        $sql = "SELECT * FROM admin WHERE admin_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $adminId);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 1) {
            return $result->fetch_assoc();
        } else {
            return null;
        }
    }
}
?>
