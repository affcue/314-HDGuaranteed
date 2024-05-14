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

    public function updateRA($ra_id, $username, $password, $email, $name, $contact, $description) {
        // Check if RA ID, username, password, email, name, contact, and description are provided
        if ($ra_id && $username && $password && $email && $name && $contact && $description) {
            // Update RA account details
            return $this->RA->editProfile($ra_id, $email, $username, $password, $name, $contact, $description);
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
    $email = $_POST['email'];
    $name = $_POST['name'];
    $contact = $_POST['contact'];
    $description = $_POST['description'];

    // Update RA account
    if ($editRAAccountController->updateRA($ra_id, $username, $password, $email, $name, $contact, $description)) {
        // Redirect to a success page
        header("Location: ../../Boundary/sys_admin/search_ra_account.php");
        exit();
    } else {
        // Handle update failure
        echo "Failed to update RA account.";
    }
}
?>
