<?php
require_once("../../Entity/ra/ViewAgentEntity.php");

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

        // Include the boundary file
        require_once("../../Boundary/ra/viewAgentboundary.php");
    }
}
?>
