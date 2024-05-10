<?php
include "header.php";
include "../../Control/sys_admin/search_user_account_controller.php"; // Include the controller

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    // Get search term and filters
    $searchTerm = $_POST['search'];

    // Call handleSearch method of SearchUserController
    $users = $searchUserController->handleSearch($searchTerm);
} else {
    // If form is not submitted, fetch full list of users
    $users = $searchUserController->getAllUsers(); // No search term provided, so it fetches all users
}

// Debugging code to verify the contents of $users
if(isset($users) && !empty($users)) {
    // Debugging code to verify the contents of $users
    ;
} else {
    echo "<p>No user found.</p>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search User</title>
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
        <h2 class="title">Search User</h2>
        <div class="search-bar">
            <form method="POST" action="">
                <input type="text" name="search" placeholder="Search by username...">
                <button type="submit" name="submit">Search</button>
            </form>
            <br>
        <!-- Display users if available -->
        <?php if(isset($users) && !empty($users)): ?>
            <div class="users">
                <table>
                    <thead>
                        <tr>
                            <th>Username</th>
                            <th>Password</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($users as $user): ?>
                            <tr>
                                <td><?php echo $user['username']; ?></td>
                                <td><?php echo $user['password']; ?></td>
                                <td><a href="view_user_account.php?user_id=<?php echo $user['user_id']; ?>" class="btn btn-primary">View</a></td>                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php else: ?>
            <p>No users found.</p>
        <?php endif; ?>
    </div>
</body>
</html>
