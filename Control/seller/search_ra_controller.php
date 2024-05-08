<?php
require_once('../../Database/db_conn.php');
require_once('../../Entity/ra.php');

class SearchRAController {
    private $RA;

    public function __construct($conn) {
        $this->RA = new RA($conn);
    }

    public function searchRA($searchTerm = null) {
        return $this->RA->searchRA($searchTerm);
    }

    public function getAllRA() {
        return $this->RA->getAllRA();
    }

    public function handleSearch($searchTerm) {
        if (!empty($searchTerm)) {
            // If any search criteria is provided, perform search
            return $this->searchRA($searchTerm);
        } else {
            // If no search criteria provided, fetch all RA
            return $this->getAllRA();
        }
    }
}

$searchRAController = new SearchRAController($conn);
?>
