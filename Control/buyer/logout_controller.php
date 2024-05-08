<?php
require_once('../../Entity/seller/logout_entity.php');

class LogoutController {
    public function logout() {
        $logoutEntity = new LogoutEntity();
        $logoutEntity->endSession();
    }
}
?>
