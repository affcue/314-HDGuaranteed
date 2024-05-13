<?php
require_once('../../Database/db_conn.php');
require_once('../../Entity/ra/ra_login_entity.php');

class RALoginController {
    private $conn;
    public $username;
    public $password;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function loginUser($username, $password) {
        $raEntity = new RALoginEntity($this->conn);
        $ra_id = $raEntity->validateLogin($username, $password);
        if ($ra_id) {
            session_start();
            $_SESSION['ra_id'] = $ra_id;
            header("Location: ../../Boundary/ra/ra_home.php");
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
    
    $raLoginController = new RALoginController($conn);
    $raLoginController->loginUser($username, $password);
}
?>
