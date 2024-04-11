<?php
require_once('User.php'); // Assuming User.php is your Entity file

class EditProfileController {
    private $userEntity;

    function __construct() {
        $this->userEntity = new User();
    }

    function updateUserProfile($userId, $name, $email) {
        if (!$this->validateEmail($email)) {
            // Handle invalid email
            return false;
        }
        // Proceed with user update after validation
    }

    // Additional method for email validation
    private function validateEmail($email) {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }
}
?>