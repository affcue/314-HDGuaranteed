<?php
require_once("../../Entity/ra.php");
require_once("../../Database/db_conn.php");

class ViewAgentController
{
    private $RA;

    public function __construct($conn)
    {
        $this->RA = new RA($conn);
    }

    public function displayAgentInfo($agentName)
    {
        $agent = $this->RA->fetchAgentByName($agentName);
        return $agent;
    }


    public function displayAgentReviews($raId)
    {
        $reviews = $this->RA->fetchAgentReviews($raId);
        return $reviews;
    }
}

?>
