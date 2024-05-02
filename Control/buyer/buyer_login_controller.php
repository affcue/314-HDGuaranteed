<?php
require_once('../../Database/db_conn.php');
require_once('../../Entity/buyer/buyer_login_entity.php');

class BuyerLoginController {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function loginUser($username, $password) {
        $buyerEntity = new BuyerLoginEntity($this->conn);
        $user_id = $buyerEntity->validateLogin($username, $password);
        if ($user_id) {
            session_start();
            $_SESSION['user_id'] = $user_id;
            header("Location: ../../Boundary/buyer/buyer_home.php");
            exit();
        } else {
            // Handle invalid login
            echo "Invalid username or password";
        }
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    $buyerLoginController = new BuyerLoginController($conn);
    $buyerLoginController->loginUser($username, $password);
}
?>
