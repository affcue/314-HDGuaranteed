<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
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

        input[type="text"], input[type="email"], input[type="password"], input[type="number"], textarea {
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
    <?php 
    session_start();
    if (!isset($_SESSION['ra_id'])) {
        header("Location: ra_login.php");
        exit();
    }

    include_once '../../Control/ra/edit_profile_controller.php';

    // Fetch RA details from the database based on session ra_id
    $ra_details = $edit_profile_controller->getProfileDetails($_SESSION['ra_id']);
    include 'header.php';
    ?>
    <h1 class="title">Edit Profile</h1>
    <form action="../../Control/ra/edit_profile_controller.php" method="post">
        <input type="hidden" name="ra_id" value="<?php echo $_SESSION['ra_id']; ?>">
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" value="<?php echo $ra_details['e-mail']; ?>"><br>
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username" value="<?php echo $ra_details['username']; ?>"><br>
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" value="<?php echo $ra_details['password']; ?>"><br>
        <label for="name">Name:</label><br>
        <input type="text" id="name" name="name" value="<?php echo $ra_details['name']; ?>"><br>
        <label for="contact">Contact:</label><br>
        <input type="text" id="contact" name="contact" value="<?php echo $ra_details['contact']; ?>"><br>
        <label for="description">Description:</label><br>
        <textarea id="description" name="description"><?php echo $ra_details['description']; ?></textarea><br>
        <input type="submit" value="Save Changes" name="submit">
    </form>
</body>
</html>
