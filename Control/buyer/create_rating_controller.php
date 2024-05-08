<?php
require_once('../../Database/db_conn.php');
require_once('../../Entity/rating.php');

class CreateRatingController {
    private $Rating;

    public function __construct($conn) {
        $this->Rating = new Rating($conn);
    }

    public function createRating($user_id, $ra_id, $stars, $description) {
        return $this->Rating->addRating($user_id, $ra_id, $stars, $description);
    }
}

$createRatingController = new CreateRatingController($conn);
?>
