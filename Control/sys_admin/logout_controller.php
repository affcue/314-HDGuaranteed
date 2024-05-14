<?php
require_once('../../Entity/sys_admin/logout_entity.php');

class LogoutController {
    public function logout() {
        $logoutEntity = new LogoutEntity();
        $logoutEntity->endSession();
    }
}
?>
