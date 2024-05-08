<?php
session_start(); // Start the session

require_once("../../Control/ra/ra_review_delete_controller.php");

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    // Redirect to the login page or display an error message
    header("Location: login.php");
    exit();
}

// Retrieve user ID from session
$user_id = $_SESSION['user_id'];

// Initialize the controller
$controller = new ReviewDeleteController();

// Get all reviews written by the user
$reviews = $controller->getUserReviews($user_id);

// Display the reviews with checkboxes for deletion
if (!empty($reviews)) {
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Delete Reviews</title>
    </head>
    <body>
        <h1>Delete Reviews</h1>
        <form method="POST" action="../../Control/ra/ra_review_delete_controller.php">
            <input type="hidden" name="user_id" value="<?php echo $user_id; ?>"> <!-- Add hidden input field for user_id -->
            <?php foreach ($reviews as $review) { ?>
                <input type="checkbox" name="reviewsToDelete[]" value="<?php echo $review['rating_id']; ?>">
                <label><?php echo "Rating: {$review['stars']}, Description: {$review['description']}"; ?></label><br>
            <?php } ?>
            <button type="submit">Delete Selected Reviews</button>
        </form>
    </body>
    </html>
    <?php
} else {
    echo "No reviews found for this user.";
}
?>
