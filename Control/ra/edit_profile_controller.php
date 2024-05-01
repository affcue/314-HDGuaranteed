<?php
include_once '../../Database/db_conn.php';
include_once '../../Entity/ra.php';

class EditProfileController {
    private $ra_controller;

    public function __construct($conn) {
        $this->ra_controller = new RA($conn);
    }

    public function getProfileDetails($ra_id) {
        return $this->ra_controller->getProfileDetails($ra_id);
    }

    public function handleProfileUpdate() {
        if (isset($_POST['submit'])) {
            $ra_id = $_POST['ra_id'];
            $email = $_POST['email'];
            $username = $_POST['username'];
            $password = $_POST['password'];
            $name = $_POST['name'];
            $contact = $_POST['contact'];
            $description = $_POST['description'];

            $this->ra_controller->editProfile($ra_id, $email, $username, $password, $name, $contact, $description);
            header("Location: ../../Boundary/ra/edit_profile_success.php");
            exit();
        }
    }
}

$edit_profile_controller = new EditProfileController($conn);
$edit_profile_controller->handleProfileUpdate();
?>
