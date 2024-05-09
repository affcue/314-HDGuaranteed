<?php
require_once("../../Entity/admin/buyerseller_search_entity.php");

class ViewBuyerSellerController
{
    private $entity;

    public function __construct()
    {
        $this->entity = new BuyerSellerEntity();
    }

    public function displayBuyerSellerInfo($buyerSellerName)
    {
        $buyerseller = $this->entity->fetchBuyerSellerByName($buyerSellerName);
        return $buyerseller;
    }
}

?>
