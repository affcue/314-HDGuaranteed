<?php
require_once("../../Entity/admin/admin_search_entity.php");

class ViewAdminController
{
    private $entity;

    public function __construct()
    {
        $this->entity = new AdminEntity();
    }

    public function displayAdminInfo($adminName)
    {
        $admin = $this->entity->fetchAdminByName($adminName);
        return $admin;
    }


    public function displayAdmintReviews($adminId)
    {
        $reviews = $this->entity->fetchAdminReviews($adminId);
        return $reviews;
    }
}

?>
