<?php
require_once("../../Entity/ra/ra_view_entity.php");

class ViewAgentController
{
    private $entity;

    public function __construct()
    {
        $this->entity = new ViewAgentEntity();
    }

    public function displayAgentInfo($agentName)
    {
        // Retrieve agent information based on the provided name
        $agent = $this->entity->fetchAgentByName($agentName);

        // Return the agent details
        return $agent;
    }

    public function displayAgentReviews($raId)
    {
        // Retrieve agent reviews based on the provided raId
        $reviews = $this->entity->fetchAgentReviews($raId);

        // Return the agent reviews
        return $reviews;
    }
}
