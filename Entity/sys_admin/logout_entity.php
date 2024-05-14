<?php
class LogoutEntity {
    public function endSession() {
        // Unset all session variables
        $_SESSION = array();

        // Destroy the session
        session_destroy();
    }
}
?>
