<?php
session_start();
include "../../Control/seller/delete_rating_controller.php";
include "../../Control/seller/view_rating_controller.php";

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: seller_login_boundary.php");
    exit();
}

$user_id = $_SESSION['user_id'];

// Retrieve RA ID from URL
if (isset($_GET['ra_id'])) {
    $ra_id = $_GET['ra_id'];

    // Handle delete rating
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete_rating'])) {
    $rating_id = $_POST['rating_id'];
    $deleteRatingController->deleteRating($rating_id);
    // Redirect back to view_ratings.php after deletion
    header("Location: view_ra.php?ra_id=$ra_id");
    exit();
}

    // Retrieve overall rating and ratings by RA ID
    $overallRating = $viewRatingsController->calculateOverallRating($ra_id);
    $ratings = $viewRatingsController->getAllRatingsByRAID($ra_id);

    // Check if user has already rated the RA
    $hasRated = $viewRatingsController->hasUserRatedRA($user_id, $ra_id);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>View Ratings</title>
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
<style>
    body {
        font-family: 'Roboto', sans-serif;
        background-color: #f2f2f2;
        margin: 0;
        padding: 0;
    }

    .container {
        max-width: 800px;
        margin: 0 auto;
        padding: 20px;
    }

    .title {
        margin-left: 20px;
    }

    .overall-rating {
        margin-bottom: 20px;
    }

    .rating-list {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .rating-item {
        margin-bottom: 10px;
    }

    .buttons button {
            background-color: #007bff; /* Set button background color */
            color: white; /* Set button text color */
            padding: 8px 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-family: 'Roboto', sans-serif;
        }
</style>
</head>
<body>

<div class="container">
    <h2 class="overall-rating">Overall Rating: <?php echo $overallRating; ?></h2>
    <div class="ratings">
        <?php if (!empty($ratings)) : ?>
            <ul class="rating-list">
                <?php foreach ($ratings as $rating) : ?>
                    <li class="rating-item">
                        <strong>User ID:</strong> <?php echo $rating['user_id']; ?><br>
                        <strong>Stars:</strong> <?php echo $rating['stars']; ?><br>
                        <strong>Description:</strong> <?php echo $rating['description']; ?><br>
                        <?php if ($user_id == $rating['user_id']) : ?>
                            <form method="post" action="">
                                <input type="hidden" name="rating_id" value="<?php echo $rating['rating_id']; ?>">
                                <div class="buttons">
                                    <button type="submit" name="delete_rating">Delete My Rating</button>
                                </div>
                            </form>
                        <?php endif; ?>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php else : ?>
            <p>No ratings found.</p>
        <?php endif; ?>
    </div>
    <?php if (!$hasRated) : ?>
        <div class="buttons">
        <button onclick="window.location.href='create_rating.php?ra_id=<?php echo $ra_id; ?>'">Leave a Rating</button>
        </div>
    <?php endif; ?>
</div>

</body>
</html>
