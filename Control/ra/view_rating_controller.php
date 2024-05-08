<?php
require_once('../../Database/db_conn.php');
require_once('../../Entity/rating.php');

class ViewRatingsController {
    private $Rating;

    public function __construct($conn) {
        $this->Rating = new Rating($conn);
    }

    public function getAllRatingsByRAID($ra_id) {
        return $this->Rating->getRatingsByRAID($ra_id);
    }

    public function calculateOverallRating($ra_id) {
        $ratings = $this->getAllRatingsByRAID($ra_id);
        $totalStars = 0;
        $totalRatings = count($ratings);
        if ($totalRatings > 0) {
            foreach ($ratings as $rating) {
                $totalStars += $rating['stars'];
            }
            $overallRating = $totalStars / $totalRatings;
            return round($overallRating, 2); // Round to 2 decimal places
        } else {
            return 0; // No ratings, return 0
        }
    }
}

$viewRatingsController = new ViewRatingsController($conn);
?>
