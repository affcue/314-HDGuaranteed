<?php
require_once('../../Database/db_conn.php');
require_once('../../Entity/user.php');

class EditUserAccountController {
    private $user;

    public function __construct($conn) {
        $this->user = new User($conn);
    }

    public function getUserByID($ra_id) {
        return $this->user->getUserByID($ra_id);
    }

    public function updateUser($user_id, $username, $password) {
        return $this->user->updateUser($user_id, $username, $password);
    }
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    // Get form data
    $user_id = $_POST['user_id'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Initialize EditUserAccountController
    $editUserAccountController = new EditUserAccountController($conn);

    // Call updateUser method
    $result = $editUserAccountController->updateUser($user_id, $username, $password);

    if($result) {
        // Redirect to success page
        header("Location: ../../Boundary/sys_admin/search_user_account.php");
        exit();
    } else {
        // Handle update failure
        echo "Failed to update user account.";
    }
}
?>
