<?php
require_once('../../Database/db_conn.php');
require_once("../../Entity/ra.php");

class ViewAgentController
{
    private $entity;

    public function __construct($conn)
    {
        $this->entity = new RA($conn);
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
