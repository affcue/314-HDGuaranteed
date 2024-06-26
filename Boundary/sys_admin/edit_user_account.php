<?php
include "header.php";
include "../../Control/sys_admin/edit_user_account_controller.php";

$editUserAccountController = new EditUserAccountController($conn);

// Check if a user ID is provided in the URL
if(isset($_GET['user_id'])) {
    // Retrieve the user details using the provided user ID
    $user_id = $_GET['user_id'];
    $user = $editUserAccountController->getUserByID($user_id);
    
    // Check if the user exists
    if($user) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User Account</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        /* General styles */
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
            text-align: center;
        }

        /* Form styles */
        form {
            margin-top: 20px;
            margin-left: auto;
            margin-right: auto;
            width: 70%; /* Adjust as needed */
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        input[type="text"], input[type="password"], input[type="email"], input[type="number"], textarea {
            width: calc(100% - 16px); /* Adjust for padding */
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-bottom: 10px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="title">Edit User Account</h2>
        <form action="../../Control/sys_admin/edit_user_account_controller.php" method="post">
            <?php if(isset($user_id)): ?>
                <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
            <?php endif; ?>
            <label for="username">Username:</label><br>
            <input type="text" id="username" name="username" value="<?php echo $user['username']; ?>"><br>
            <label for="password">Password:</label><br>
            <input type="password" id="password" name="password" value="<?php echo $user['password']; ?>"><br>
            <label for="email">Email:</label><br>
            <input type="email" id="email" name="email" value="<?php echo $user['e-mail']; ?>"><br>
            <label for="name">Name:</label><br>
            <input type="text" id="name" name="name" value="<?php echo $user['name']; ?>"><br>
            <label for="contact">Contact:</label><br>
            <input type="text" id="contact" name="contact" value="<?php echo $user['contact']; ?>"><br>
            <input type="submit" name="submit" value="Save Changes">
        </form>
    </div>
</body>
</html>
<?php
    } else {
        echo "<p>User account not found.</p>";
    }
} else {
    echo "<p>User ID not provided.</p>";
}
?>
