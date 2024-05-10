<?php
require_once('../../Database/db_conn.php');
require_once('../../Entity/admin.php');

class DeleteAdminAccountController {
    private $admin;

    public function __construct($conn) {
        $this->admin = new Admin($conn);
    }

    public function deleteAdmin($admin_id) {
        return $this->admin->deleteAdmin($admin_id);
    }
}

$deleteAdminAccountController = new DeleteAdminAccountController($conn);

// Check if admin ID is provided
if (isset($_POST['admin_id'])) {
    $admin_id = $_POST['admin_id'];
    
    // Delete the admin account
    if ($deleteAdminAccountController->deleteAdmin($admin_id)) {
        // Redirect back to the search admin account page after successful deletion
        header("Location: ../../Boundary/sys_admin/search_admin_account.php");
        exit(); // Ensure script stops executing after redirection
    } else {
        echo "Failed to delete admin account."; // Handle deletion failure
    }
} else {
    echo "Admin ID not provided."; // Handle missing admin ID
}
?>
