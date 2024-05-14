<?php
require_once('../../Database/db_conn.php');
require_once('../../Entity/ra.php');

class SearchRAAccountController {
    private $RA;

    public function __construct($conn) {
        $this->RA = new RA($conn);
    }

    public function searchRAByUsername($username) {
        return $this->RA->searchRAByUsername($username);
    }
    

    public function getAllRA() {
        return $this->RA->getAllRAIncludingSuspend();
    }

    public function handleSearch($searchTerm) {
        if (!empty($searchTerm)) {
            // If any search criteria is provided, perform search
            return $this->searchRAByUsername($searchTerm);
        } else {
            // If no search criteria provided, fetch all RA
            return $this->getAllRA();
        }
    }
}

$searchRAAccountController = new SearchRAAccountController($conn);
?>
