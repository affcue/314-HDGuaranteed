<?php

require_once("../../Entity/ra_rating_entity.php");

class RatingController
{
    private $ratingEntity;

    public function __construct()
    {
        $this->ratingEntity = new RARatingEntity();
    }

    public function addRating($stars, $description)
    {
        // Assuming you have user_id and ra_id available here, replace with appropriate values
        $userId = 1; // Replace with actual user_id
        $raId = 1; // Replace with actual ra_id

        // Add the rating to the database
        $this->ratingEntity->addRating($raId, $userId, $stars, $description);
    }
}

?>
