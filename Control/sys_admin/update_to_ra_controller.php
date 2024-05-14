<?php
require_once('../../Database/db_conn.php');
require_once('../../Entity/user.php');
require_once('../../Entity/ra.php');

class UpdateToRAController {
    private $conn;
    private $user;
    private $ra;

    public function __construct($conn) {
        $this->conn = $conn;
        $this->user = new User($conn);
        $this->ra = new RA($conn);
    }

    public function updateUserToRA($user_id) {
        // Fetch user details by user_id
        $user_details = $this->user->getUserByID($user_id);

        // Check if user exists
        if($user_details) {
            // Create RA account using user details
            $ra_created = $this->ra->createRA($user_details['e-mail'], $user_details['username'], $user_details['password'], $user_details['name'], $user_details['contact'], 'Description');

            // Check if RA account creation was successful
            if($ra_created) {
                // Delete user account
                $user_deleted = $this->user->deleteUser($user_id);

                // Check if user account deletion was successful
                if($user_deleted) {
                    return true; // Success
                } else {
                    return false; // Failed to delete user account
                }
            } else {
                return false; // Failed to create RA account
            }
        } else {
            return false; // User not found
        }
    }
}

// Check if user_id is provided in the URL
if(isset($_GET['user_id'])) {
    // Retrieve the user_id from the URL parameter
    $user_id = $_GET['user_id'];

    // Initialize UpdateToRAController object
    $updateToRAController = new UpdateToRAController($conn);

    // Update user to RA and handle result
    $result = $updateToRAController->updateUserToRA($user_id);
    if($result) {
        // Redirect to success page or perform any other action
        header("Location: ../../Boundary/sys_admin/search_user_account.php");
        exit();
    } else {
        // Handle update failure
        echo "Failed to update user to RA.";
    }

    // Close database connection
    $conn->close();
} else {
    // Handle user_id not provided
    echo "User ID not provided.";
}
?>
