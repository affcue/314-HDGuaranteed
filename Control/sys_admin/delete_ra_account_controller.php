<?php
require_once('../../Database/db_conn.php');
require_once('../../Entity/ra.php');

class DeleteRAAccountController {
    private $RA;

    public function __construct($conn) {
        $this->RA = new RA($conn);
    }

    public function deleteRA($ra_id) {
        return $this->RA->deleteRA($ra_id);
    }
}

$deleteRAAccountController = new DeleteRAAccountController($conn);

// Check if RA ID is provided
if (isset($_POST['ra_id'])) {
    $ra_id = $_POST['ra_id'];
    
    // Delete the RA account
    if ($deleteRAAccountController->deleteRA($ra_id)) {
        // Redirect back to the view RA account page after successful deletion
        header("Location: ../../Boundary/sys_admin/search_ra_account.php");
        exit(); // Ensure script stops executing after redirection
    } else {
        echo "Failed to delete RA account."; // Handle deletion failure
    }
} else {
    echo "RA ID not provided."; // Handle missing RA ID
}
?>
