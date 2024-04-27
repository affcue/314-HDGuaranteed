<?php
require_once("../../Control/ra_rating_controller.php");

// Get the user_id and ra_id from the URL parameters
$user_id = $_GET['user_id'] ?? null;
$ra_id = $_GET['ra_id'] ?? null;

// Check if both user_id and ra_id are provided
if ($user_id !== null && $ra_id !== null) {
    // Initialize the controller
    $controller = new RatingController();

    // Check if form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Get the rating and description from the form
        $stars = $_POST['stars'] ?? null;
        $description = $_POST['description'];

        // Add the rating to the database only if stars and description are provided
        if ($stars !== null && $description !== null) {
            $controller->addRating($ra_id, $user_id, $stars, $description); // Pass ra_id to addRating method
            
            // Redirect to the confirmation page after submission
            header("Location: ra_rating_confirmed.php");
            exit();
        } else {
            // Handle the case when stars or description is not provided
            // For example, you can display an error message to the user
            echo "Please provide both stars rating and description.";
        }
    }
} else {
    // Redirect to the previous page if user_id or ra_id is not provided
    header("Location: ra_search.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rate Agent</title>
</head>

<body>

    <?php include 'header.php'; ?>

    <h1>Rate Agent</h1>

    <form method="POST">
    <label for="stars">Rate the agent out of 5:</label><br>
    <!-- Use radio buttons for selecting the rating -->
    <input type="radio" id="stars1" name="stars" value="1">
    <label for="stars1">1</label>
    <input type="radio" id="stars2" name="stars" value="2">
    <label for="stars2">2</label>
    <input type="radio" id="stars3" name="stars" value="3">
    <label for="stars3">3</label>
    <input type="radio" id="stars4" name="stars" value="4">
    <label for="stars4">4</label>
    <input type="radio" id="stars5" name="stars" value="5">
    <label for="stars5">5</label><br>

    <label for="description">Explain your rating:</label><br>
    <textarea name="description" rows="4" cols="50"></textarea><br>

    <!-- Add the link to the confirmation page -->
    <button type="submit">Submit Rating</button>
</form>


</body>

</html>
