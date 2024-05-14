<?php
require_once('../../Database/db_conn.php');
require_once('../../Entity/user.php');

class EditUserProfileController {
    private $user;

    public function __construct($conn) {
        $this->user = new User($conn);
    }

    public function updateUserProfile($user_id, $purpose) {
        return $this->user->updateUserProfile($user_id, $purpose);
    }
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    // Get form data
    $user_id = $_POST['user_id'];
    $purpose = $_POST['purpose'];

    // Debugging: Output the received user_id and purpose
    echo "User ID: " . $user_id . "<br>";
    echo "Purpose: " . $purpose . "<br>";

    // Initialize EditUserProfileController
    $editUserProfileController = new EditUserProfileController($conn);

    // Call updateUserProfile method
    $result = $editUserProfileController->updateUserProfile($user_id, $purpose);

    if($result) {
        // Redirect to success page
        header("Location: ../../Boundary/sys_admin/search_user_account.php");
        exit();
    } else {
        // Handle update failure
        echo "Failed to update user profile.";
    }
}

?>
