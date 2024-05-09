<?php
require_once("../../Entity/admin/view_buyerseller_entity.php");

function getBuyerSellerDetails($userId)
{
    $userEntity = new BuyerSellerEntity();
    return $userEntity->fetchBuyerSellerById($userId);
}
?>
