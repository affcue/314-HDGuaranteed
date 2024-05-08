<?php
session_start(); // Start the session
// Check if the user_id is set in the session
if (!isset($_SESSION['user_id'])) {
    // Redirect to the seller login page if not logged in
    header("Location: ../../Boundary/seller/seller_login_boundary.php");
    exit();
}

// Get the user_id from the session
$user_id = $_SESSION['user_id'];

// Display user_id on the website (added this line)
echo "User ID: $user_id (remove later)";
// Get the ra_id from the URL parameters
if (isset($_GET['ra_id'])) {
    // Store the ra_id in the session
    $_SESSION['ra_id'] = $_GET['ra_id'];
} else {
    // Redirect to the previous page if ra_id is not provided
    header("Location: ra_search.php");
    exit();
}

require_once("../../Control/ra/ra_view_controller.php");

$controller = new ViewAgentController();
$agent = $controller->displayAgentInfo($_GET['name']);
$reviews = $controller->displayAgentReviews($agent['ra_id']);

// Calculate average review score
$sum = 0;
if (count($reviews) > 0) {
    foreach ($reviews as $review) {
        $sum += $review['stars'];
    }
    $averageScore = $sum / count($reviews);
    $averageScoreFormatted = number_format($averageScore, 2); // Format to 2 decimal places
} else {
    $averageScore = 0;
    $averageScoreFormatted = '0.00'; // Set default formatted value if no reviews
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Agent</title>
    <style>
        .service-button {
            display: flex;
            justify-content: flex-end;
            margin-bottom: 2px;
        }

        .service-button button {
            margin-left: 10px;
            padding: 1px 1px;
            font-size: 13px;
        }
    </style>
</head>
<body>
    <div class="adminmenu-container">
        <div class="service-button">
            <button type="submit" name="find_agent" onclick="location.href='RASearch.php'">Find Agent</button>
            <button type="submit" name="find_listing">Find Listing</button>
            <button type="submit" name="logout">Logout</button>
        </div>
        <h1>Agent Details</h1>
        <?php if (isset($agent)) : ?>
            <div id="agent-details">
                <p><strong>Check ra_id (remove later)</strong> <span id="agent-ra-id"><?php echo htmlspecialchars($agent['ra_id']); ?></span></p>
                <p><strong>Name:</strong> <span id="agent-name"><?php echo htmlspecialchars($agent['name']); ?></span></p>
                <p><strong>Email:</strong> <span id="agent-email"><?php echo htmlspecialchars($agent['e-mail']); ?></span></p>
                <p><strong>Contact:</strong> <span id="agent-contact"><?php echo htmlspecialchars($agent['contact']); ?></span></p>
            </div>
        <?php endif; ?>
        <div>
            <p><strong>About Me:</strong><span id="agent-about"><?php echo htmlspecialchars($agent['description']); ?></span></p>
        </div>
        <h1>Overall Reviews</h1>
        <div id="overall-reviews">
            <p>Overall Score: <span id="overall-score"><?php echo $averageScoreFormatted; ?></span>/5</p>
            <?php if (count($reviews) > 0) : ?>
                <ol id="reviews-list">
                    <?php foreach ($reviews as $review) : ?>
                        <li><?php echo htmlspecialchars($review['description']) . ' - written by anonymous user' . ' (Score: ' . $review['stars'] . '/5)'; ?></li>
                    <?php endforeach; ?>
                </ol>
            <?php else : ?>
                <p>No reviews</p>
            <?php endif; ?>
        </div>
        <br></br>
        <a href="ra_rating_boundary.php?user_id=<?php echo $user_id; ?>&ra_id=<?php echo $agent['ra_id']; ?>"><button>Rate agent</button></a>
        <a href="ra_review_delete_boundary.php?user_id=<?php echo $user_id; ?>&ra_id=<?php echo $agent['ra_id']; ?>"><button>Delete my rating</button></a>
        <a href="ra_search.php"><button>Return</button></a>
        <a href="../seller/seller_logout.php"><button>Log out</button></a>
    </div>
</body>
</html>
