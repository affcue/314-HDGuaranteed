<?php
require_once('../../Database/db_conn.php');
require_once('../../Entity/ra.php');

class EditRAAccountController {
    private $RA;

    public function __construct($conn) {
        $this->RA = new RA($conn);
    }

    public function getRAByRAID($ra_id) {
        return $this->RA->getRAByRAID($ra_id);
    }

    public function updateRA($ra_id, $username, $password) {
        // Check if RA ID, username, and password are provided
        if ($ra_id && $username && $password) {
            // Update RA account details
            return $this->RA->updateRA($ra_id, $username, $password);
        } else {
            // Handle missing parameters
            return false;
        }
    }
}

$editRAAccountController = new EditRAAccountController($conn);

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $ra_id = $_POST['ra_id'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Update RA account
    if ($editRAAccountController->updateRA($ra_id, $username, $password)) {
        // Redirect to a success page
        header("Location: ../../Boundary/sys_admin/search_ra_account.php");
        exit();
    } else {
        // Handle update failure
        echo "Failed to update RA account.";
    }
}
?>
