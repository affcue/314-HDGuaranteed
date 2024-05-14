<?php include 'header.php';
$purpose;
$user_id = $_GET['user_id'];
$purpose = $_POST['purpose']?? '';
error_reporting(E_ERROR | E_PARSE);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User Profile</title>
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

        select {
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
        <h2 class="title">Edit User Profile</h2>
        <form action="../../Control/sys_admin/edit_user_profile_controller.php" method="post">
            <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
            <label for="purpose">Purpose:</label><br>
            <select name="purpose" id="purpose">
                <option value="admin">Admin</option>
                <option value="buyer">Buyer</option>
                <option value="seller">Seller</option>
                <option value="suspended">Suspended</option>
            </select><br><br>
            <input type="submit" name="submit" value="Save Changes">
        </form>
    </div>
</body>
</html>
