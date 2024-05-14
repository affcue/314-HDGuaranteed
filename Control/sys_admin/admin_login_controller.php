<?php
session_start(); // Start the session

include('../../Database/db_conn.php');
include('../../Entity/sys_admin/admin_login_entity.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['username']) && isset($_POST['password'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $sys_adminEntity = new AdminLoginEntity($conn);

        $user_id = $sys_adminEntity->validateLogin($username, $password);

        if ($user_id) {
            // Store user_id and username in session
            $_SESSION['user_id'] = $user_id;
            $_SESSION['username'] = $username;
            header("Location: ../../Boundary/sys_admin/admin_home.php");
            exit();
        } else {
            $_SESSION['login_error'] = "Invalid username or password";
            header("Location: ../../Boundary/sys_admin/admin_login.php");
            exit();
        }
    } else {
        header("Location: ../../Boundary/sys_admin/admin_login.php");
        exit();
    }
} else {
    header("Location: ../../Boundary/sys_admin/admin_login.php");
    exit();
}
?>
