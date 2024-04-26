<?php
require_once("../../Control/ra_rating_controller.php");

// Initialize the controller
$controller = new RatingController();

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the rating and description from the form
    $stars = $_POST['stars'] ?? null;
    $description = $_POST['description'];

    // Assuming you have agent's ID available
    $raId = $agent['ra_id'];

    // Add the rating to the database only if stars and description are provided
    if ($stars !== null && $description !== null) {
        $controller->addRating($raId, $userId, $stars, $description); // Pass ra_id to addRating method
    } else {
        // Handle the case when stars or description is not provided
        // For example, you can display an error message to the user
        echo "Please provide both stars rating and description.";
    }
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

    <button type="submit">Submit Rating</button>
</form>


</body>

</html>
