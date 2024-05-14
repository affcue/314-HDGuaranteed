<?php
include "header.php";
include "../../Control/sys_admin/edit_ra_profile_controller.php";

// Check if an RA ID is provided in the URL
if(isset($_GET['ra_id'])) {
    // Retrieve the RA details using the provided RA ID
    $ra_id = $_GET['ra_id'];
    $ra = $editRAProfileController->getRAByRAID($ra_id);
    
    // Check if the RA exists
    if($ra) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit RA Profile</title>
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
        <h2 class="title">Edit RA Profile</h2>
        <form action="../../Control/sys_admin/edit_ra_profile_controller.php" method="post">
            <input type="hidden" name="ra_id" value="<?php echo $ra['ra_id']; ?>">
            <label for="type">Type:</label><br>
            <select name="type" id="type">
                <option value="active" <?php if ($ra['type'] == 'active') echo 'selected'; ?>>Active</option>
                <option value="suspended" <?php if ($ra['type'] == 'suspended') echo 'selected'; ?>>Suspended</option>
            </select><br><br>
            <input type="submit" value="Save Changes">
        </form>
    </div>
</body>
</html>
<?php
    } else {
        echo "<p>RA account not found.</p>";
    }
} else {
    echo "<p>RA ID not provided.</p>";
}
?>
