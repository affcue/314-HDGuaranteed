<?php
require_once('../../Database/db_conn.php');
require_once('../../Entity/admin.php');

class SearchAdminAccountController {
    private $Admin;

    public function __construct($conn) {
        $this->Admin = new Admin($conn);
    }

    public function searchAdmin($searchTerm = null) {
        return $this->Admin->searchAdmin($searchTerm);
    }

    public function getAllAdmins() {
        return $this->Admin->getAllAdmins();
    }

    public function handleSearch($searchTerm) {
        if (!empty($searchTerm)) {
            // If any search criteria is provided, perform search
            return $this->searchAdmin($searchTerm);
        } else {
            // If no search criteria provided, fetch all admins
            return $this->getAllAdmins();
        }
    }
}

$searchAdminAccountController = new SearchAdminAccountController($conn);
?>
