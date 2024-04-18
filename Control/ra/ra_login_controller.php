<?php
// ra_login_controller.php

require_once("config.php");
require_once("ra_login_entity.php");

class RA_Login_Controller {
    private $entity;

    public function __construct($db) {
        // Initialize the entity
        $this->entity = new RA_Login_Entity($db);
    }

    public function handleLogin() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $username = trim($_POST["username"]);
            $password = $_POST["password"];
            $ra_id = $this->entity->verifyLogin($username, $password);

            if ($ra_id !== false) {
                // Start the session
                session_start();

                // Store RA ID in session
                $_SESSION['ra_id'] = $ra_id;

                // Redirect to home page
                header("Location: ra_home.php");
                exit;
            } else {
                echo "Invalid username or password. Please try again.";
            }
        }
    }
}

// Include config.php to establish database connection
require_once("config.php");

// Create instance of RA_Login_Controller and pass the database connection
$ra_login_controller = new RA_Login_Controller($db);
$ra_login_controller->handleLogin();
?>
