<?php
include "header.php";
include "../../Control/sys_admin/search_admin_account_controller.php"; // Include the controller

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    // Get search term and filters
    $searchTerm = $_POST['search'];

    // Call handleSearch method of SearchAdminAccountController
    $admins = $searchAdminAccountController->handleSearch($searchTerm);
} else {
    // If form is not submitted, fetch full list of admins
    $admins = $searchAdminAccountController->getAllAdmins(); // No search term provided, so it fetches all admins
}

// Debugging code to verify the contents of $admins
if(isset($admins) && !empty($admins)) {
    // Debugging code to verify the contents of $admins
    ;
} else {
    echo "<p>No admin found.</p>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Admin</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        .container {
            width: 80%;
            margin: auto;
        }
        .title {
            text-align: center;
            margin-top: 20px;
        }
        .search-bar {
            text-align: center;
            margin-top: 20px;
        }
        .filter-options {
            margin-top: 20px;
        }
        .listings {
            margin-top: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="title">Search Admin</h2>
        <div class="search-bar">
            <form method="POST" action="">
                <input type="text" name="search" placeholder="Search by username...">
                <button type="submit" name="submit">Search</button>
            </form>
            <br>
        <!-- Display admins if available -->
        <?php if(isset($admins) && !empty($admins)): ?>
            <div class="admins">
                <table>
                    <thead>
                        <tr>
                            <th>Username</th>
                            <th>Password</th>
                            <th></th>
                            <!-- Add other fields as needed -->
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($admins as $admin): ?>
                            <tr>
                                <td><?php echo $admin['username']; ?></td>
                                <td><?php echo $admin['password']; ?></td>
                                <!-- Add other fields as needed -->
                                <td><a href="view_admin_account.php?admin_id=<?php echo $admin['admin_id']; ?>" class="btn btn-primary">View</a></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php else: ?>
            <p>No admin found.</p>
        <?php endif; ?>
    </div>
</body>
</html>