<?php
require_once('../../Database/db_conn.php');
require_once('../../Entity/ra.php');

class EditRAProfileController {
    private $RA;

    public function __construct($conn) {
        $this->RA = new RA($conn);
    }

    public function getRAByRAID($ra_id) {
        return $this->RA->getRAByRAID($ra_id);
    }

    public function updateRaType($ra_id, $type) {
        return $this->RA->updateRaType($ra_id, $type);
    }
}

$editRAProfileController = new EditRAProfileController($conn);

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $ra_id = $_POST['ra_id'];
    $type = $_POST['type'];

    // Update RA type
    if ($editRAProfileController->updateRaType($ra_id, $type)) {
        // Redirect to a success page or back to the RA profile page
        header("Location: ../../Boundary/sys_admin/search_ra_account.php");
        exit();
    } else {
        // Handle update failure
        echo "Failed to update RA profile.";
    }
}
?>
