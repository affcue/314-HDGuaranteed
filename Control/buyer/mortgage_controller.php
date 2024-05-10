<?php
require_once('../../Database/db_conn.php');
require_once '../../Entity/listing.php';

class MortgageController
{
    private $entity;

    public function __construct($conn) {
        $this->entity = new Listing($conn);
    }

    public function calculateMortgage($data)
    {
        return $this->entity->calculateMortgage($data);
    }
}
