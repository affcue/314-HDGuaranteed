<?php
require_once("../../Database/db_conn.php");

class BuyerSellerEntity
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

    public function fetchBuyerSellerById($userId)
    {
        $sql = "SELECT * FROM user WHERE user_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $userId);
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
