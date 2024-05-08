<?php

require_once("../../Entity/ra/ra_review_delete_entity.php");

class ReviewDeleteController
{
    private $reviewDeleteEntity;

    public function __construct()
    {
        $this->reviewDeleteEntity = new ReviewDeleteEntity();
    }

    public function getUserReviews($userId)
    {
        // Get all reviews written by the user
        return $this->reviewDeleteEntity->getUserReviews($userId);
    }

    public function deleteReviews($reviewIds)
    {
        // Delete the selected reviews
        $this->reviewDeleteEntity->deleteReviews($reviewIds);
        
        // Redirect to a confirmation page or back to the original page
        header("Location:../../Boundary/ra/ra_view.php");
        exit();
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST['user_id']) && isset($_POST['reviewsToDelete']) && !empty($_POST['reviewsToDelete'])) {
        $controller = new ReviewDeleteController();
        $reviewsToDelete = $_POST['reviewsToDelete'];
        $controller->deleteReviews($reviewsToDelete);
    } else {
        // Handle the case when no reviews are selected for deletion or user_id is not provided
        echo "No reviews selected for deletion or user ID not provided.";
    }
}
?>
