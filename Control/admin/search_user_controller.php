<?php
include '../../Database/db_conn.php';
include '../../Entity/user.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if search term and user type are set
    if (isset($_POST['search_term']) && isset($_POST['user_type'])) {
        // Retrieve and sanitize search term and user type
        $searchTerm = htmlspecialchars(trim($_POST['search_term']));
        $userType = htmlspecialchars(trim($_POST['user_type']));

        // Initialize User object
        $user = new User($conn);

        // Perform search
        $searchResults = $user->searchUsers($searchTerm, $userType);

        // Display search results
        foreach ($searchResults as $result) {
            // Output user details
            echo "Email: " . $result['e-mail'] . "<br>";
            echo "Username: " . $result['username'] . "<br>";
            echo "Name: " . $result['name'] . "<br>";
            echo "Contact: " . $result['contact'] . "<br>";

            // For buyers and sellers, display purpose
            if ($userType == "buyer" || $userType == "seller") {
                echo "Purpose: " . $result['purpose'] . "<br><br>";
            } else {
                echo "<br>";
            }
        }
    } else {
        // Handle case where search term or user type is missing
        echo "Search term or user type is missing.";
    }
} else {
    // Handle case where form is not submitted via POST method
    echo "Form not submitted.";
}

// Close connection
$conn->close();
?>
