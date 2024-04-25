<?php
require_once("../../Entity/ra/ra_entity.php");

class ViewAgentController
{
    private $entity;

    public function __construct()
    {
        $this->entity = new RAEntity();
    }

    public function displayAgentInfo($agentName)
    {
        $agent = $this->entity->fetchAgentByName($agentName);
        return $agent;
    }


    public function displayAgentReviews($raId)
    {
        $reviews = $this->entity->fetchAgentReviews($raId);
        return $reviews;
    }
}

?>
