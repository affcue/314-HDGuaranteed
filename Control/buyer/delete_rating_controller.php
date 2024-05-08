<?php
require_once('../../Database/db_conn.php');
require_once('../../Entity/rating.php');

class DeleteRatingController {
    private $Rating;

    public function __construct($conn) {
        $this->Rating = new Rating($conn);
    }

    public function deleteRating($rating_id) {
        return $this->Rating->deleteRating($rating_id);
    }
}

$deleteRatingController = new DeleteRatingController($conn);
?>
