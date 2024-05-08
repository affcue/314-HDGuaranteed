<?php
require_once('../../Database/db_conn.php');
require_once('../../Entity/ra.php');

class ViewRAController {
    private $RA;

    public function __construct($conn) {
        $this->RA = new RA($conn);
    }

    public function getRAByRAID($ra_id) {
        return $this->RA->getRAByRAID($ra_id);
    }
}

$viewRAController = new ViewRAController($conn);
?>
