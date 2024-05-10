<?php
require_once('../../Database/db_conn.php');
require_once('../../Entity/admin.php');

class EditAdminAccountController {
    private $Admin;

    public function __construct($conn) {
        $this->Admin = new Admin($conn);
    }

    public function getAdminByAdminID($admin_id) {
        return $this->Admin->getAdminByAdminID($admin_id);
    }

    public function updateAdmin($admin_id, $username, $password) {
        return $this->Admin->updateAdmin($admin_id, $username, $password);
    }
}

$editAdminAccountController = new EditAdminAccountController($conn);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $admin_id = $_POST['admin_id'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Update admin account
    if ($editAdminAccountController->updateAdmin($admin_id, $username, $password)) {
        // Redirect to a success page
        header("Location: ../../Boundary/sys_admin/search_admin_account.php");
        exit();
    } else {
        // Handle update failure
        echo "Failed to update admin account.";
    }
}

?>
