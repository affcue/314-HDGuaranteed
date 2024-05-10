<?php
require_once('../../Database/db_conn.php');
require_once('../../Entity/user.php');

class ViewUserAccountController {
    private $user;

    public function __construct($conn) {
        $this->user = new User($conn);
    }

    public function getUserByID($user_id) {
        return $this->user->getUserByID($user_id);
    }
}

$viewUserAccountController = new ViewUserAccountController($conn);
?>
