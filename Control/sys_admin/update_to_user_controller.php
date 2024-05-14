<?php
require_once('../../Database/db_conn.php');
require_once('../../Entity/ra.php');
require_once('../../Entity/user.php');

class UpdateToUserController {
    private $RA;
    private $User;

    public function __construct($conn) {
        $this->RA = new RA($conn);
        $this->User = new User($conn);
    }

    public function updateToUser($ra_id) {
        // Get RA details
        $ra = $this->RA->getRAByRAID($ra_id);

        if ($ra) {
            // Insert a new user with RA details
            $user_created = $this->User->createUser($ra['e-mail'], $ra['username'], $ra['password'], $ra['name'], $ra['contact'], 'suspended');

            if ($user_created) {
                // Delete the RA account
                $ra_deleted = $this->RA->deleteRA($ra_id);

                if ($ra_deleted) {
                    // Successfully updated to user account
                    return true;
                } else {
                    // Failed to delete RA account
                    return false;
                }
            } else {
                // Failed to create user account
                return false;
            }
        } else {
            // RA account not found
            return false;
        }
    }
}

$updateToUserController = new UpdateToUserController($conn);

// Check if RA ID is provided
if (isset($_GET['ra_id'])) {
    $ra_id = $_GET['ra_id'];

    // Update RA account to user account
    if ($updateToUserController->updateToUser($ra_id)) {
        // Redirect to a success page or back to view RA account page
        header("Location: ../../Boundary/sys_admin/search_ra_account.php");
        exit();
    } else {
        // Handle update failure
        echo "Failed to update to user account.";
    }
} else {
    // RA ID not provided
    echo "RA ID not provided.";
}
?>
