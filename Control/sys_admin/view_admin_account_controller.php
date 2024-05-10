<?php
require_once('../../Database/db_conn.php');
require_once('../../Entity/admin.php');

class ViewAdminAccountController {
    private $Admin;

    public function __construct($conn) {
        $this->Admin = new Admin($conn);
    }

    public function getAdminByAdminID($admin_id) {
        return $this->Admin->getAdminByAdminID($admin_id);
    }
}

$viewAdminAccountController = new ViewAdminAccountController($conn);
?>
