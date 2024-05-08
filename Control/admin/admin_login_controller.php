<?php
include '../../Database/db_conn.php';
include '../../Entity/admin/admin_login_entity.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM admin WHERE username='$username' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        // Authentication successful
        $row = $result->fetch_assoc();
        
        // Store admin_id in session
        session_start();
        $_SESSION['admin_id'] = $row['admin_id'];

        // Redirect to admin dashboard or any other page
        header("Location: ../../Boundary/admin/admin_home.php");
        exit();
    } else {
        // Authentication failed
        echo "Invalid username or password.";
    }
}

$conn->close();
?>
