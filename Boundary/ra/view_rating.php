<?php
include "../../Control/ra/view_rating_controller.php";
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
</style>
</head>
<body>

<div class="container">
    <?php
    $overallRating = $viewRatingsController->calculateOverallRating($ra_id);
    echo "<h2 class='overall-rating'>Overall Rating: " . $overallRating . "</h2>";
    ?>
    <div class="ratings">
        <?php
        $ratings = $viewRatingsController->getAllRatingsByRAID($ra_id);
        if (count($ratings) > 0) {
            echo "<ul class='rating-list'>";
            foreach ($ratings as $rating) {
                echo "<li class='rating-item'>";
                echo "<strong>Stars:</strong> " . $rating['stars'] . "<br>";
                echo "<strong>Description:</strong> " . $rating['description'];
                echo "</li>";
            }
            echo "</ul>";
        } else {
            echo "<p>No ratings found.</p>";
        }
        ?>
    </div>
</div>

</body>
</html>
