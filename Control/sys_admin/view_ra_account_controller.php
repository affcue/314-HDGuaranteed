<?php
require_once('../../Database/db_conn.php');
require_once('../../Entity/ra.php');

class ViewRAAccountController {
    private $RA;

    public function __construct($conn) {
        $this->RA = new RA($conn);
    }

    public function getRAByRAID($ra_id) {
        return $this->RA->getRAByRAID($ra_id);
    }
}

$viewRAAccountController = new ViewRAAccountController($conn);
?>
