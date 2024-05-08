<?php
require_once("../../Entity/admin/view_admin_entity.php");

function getAdminDetails($adminId)
{
    $adminEntity = new AdminEntity();
    return $adminEntity->fetchAdminById($adminId);
}
?>
