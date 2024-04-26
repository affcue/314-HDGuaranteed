<?php

require_once("../../Entity/rating.php");

class RatingController
{
    private $ratingEntity;

    public function __construct()
    {
        $this->ratingEntity = new Rating();
    }

    public function addRating($raId, $userId, $stars, $description)
    {
        // Add the rating to the database with ra_id
        $this->ratingEntity->addRating($raId, $userId, $stars, $description);
    }
}

?>
