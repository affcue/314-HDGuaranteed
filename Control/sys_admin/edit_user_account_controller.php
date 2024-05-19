<?php
require_once('../../Database/db_conn.php'); // Include the database connection file
require_once('../../Entity/user.php');

class EditUserAccountController {
    private $user;
    private $conn; // Add a property for the database connection

    public function __construct($conn) {
        $this->user = new User($conn);
        $this->conn = $conn; // Initialize the database connection
    }

    public function getUserByID($user_id) {
        return $this->user->getUserByID($user_id);
    }

    public function updateUser($user_id, $username, $password, $email, $name, $contact) {
        $this->user->updateUser($user_id, $username, $password, $email, $name, $contact);

        $sql = "UPDATE user SET username = ?, password = ?, `e-mail` = ?, name = ?, contact = ? WHERE user_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("sssssi", $username, $password, $email, $name, $contact, $user_id); // Bind parameters

        if ($stmt->execute()) {
            // Return true if update is successful
            return true;
        } else {
            // Return false if update fails
            return false;
        }
    }
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    // Get form data
    $user_id = $_POST['user_id'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email']; // Add email field
    $name = $_POST['name']; // Add name field
    $contact = $_POST['contact']; // Add contact field

    // Initialize EditUserAccountController
    $editUserAccountController = new EditUserAccountController($conn);

    // Call updateUser method
    $result = $editUserAccountController->updateUser($user_id, $username, $password, $email, $name, $contact);

    if($result) {
        // Redirect to success page
        header("Location: ../../Boundary/sys_admin/search_user_account.php");
        exit();
    } else {
        // Handle update failure
        echo "Failed to update user account.";
    }
}
?>
