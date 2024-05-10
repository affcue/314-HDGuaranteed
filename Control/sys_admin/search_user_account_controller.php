<?php
require_once('../../Database/db_conn.php');
require_once('../../Entity/user.php');

class SearchUserController {
    private $User;

    public function __construct($conn) {
        $this->User = new User($conn);
    }

    public function searchUser($searchTerm = null) {
        return $this->User->searchUser($searchTerm);
    }

    public function getAllUsers() {
        return $this->User->getAllUsers();
    }

    public function handleSearch($searchTerm) {
        if (!empty($searchTerm)) {
            // If any search criteria is provided, perform search
            return $this->searchUser($searchTerm);
        } else {
            // If no search criteria provided, fetch all users
            return $this->getAllUsers();
        }
    }
}

$searchUserController = new SearchUserController($conn);
?>
