<?php
require_once('../../Database/db_conn.php');
require_once('../../Entity/user.php');

class DeleteUserAccountController {
    private $user;

    public function __construct($conn) {
        $this->user = new User($conn);
    }

    public function deleteUser($user_id) {
        return $this->user->deleteUser($user_id);
    }
}

// Check if user ID is provided
if(isset($_POST['user_id'])) {
    $user_id = $_POST['user_id'];
    $deleteUserAccountController = new DeleteUserAccountController($conn);
    $result = $deleteUserAccountController->deleteUser($user_id);
    if($result) {
        // Redirect to a success page or appropriate page
        header("Location: ../../Boundary/sys_admin/search_user_account.php");
        exit();
    } else {
        // Handle deletion failure
        echo "Failed to delete user account.";
    }
} else {
    // Handle case where user ID is not provided
    echo "User ID not provided.";
}
?>
