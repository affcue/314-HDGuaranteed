<?php
include "header.php";
include "../../Control/seller/search_ra_controller.php"; // Include the controller

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    // Get search term and filters
    $searchTerm = $_POST['search'];

    // Call handleSearch method of SearchRAController
    $ras = $searchRAController->handleSearch($searchTerm);
} else {
    // If form is not submitted, fetch full list of RA
    $ras = $searchRAController->getAllRA(); // No search term provided, so it fetches all RA
}

// Debugging code to verify the contents of $ras
if(isset($ras) && !empty($ras)) {
    // Debugging code to verify the contents of $ras
    ;
} else {
    echo "<p>No RA found.</p>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search RA</title>
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
        <h2 class="title">Search RA</h2>
        <div class="search-bar">
            <form method="POST" action="">
                <input type="text" name="search" placeholder="Search by name...">
                <button type="submit" name="submit">Search</button>
            </form>
            <br>
        <!-- Display RA if available -->
        <?php if(isset($ras) && !empty($ras)): ?>
            <div class="ras">
                <table>
                    <thead>
                        <tr>
                            <th>RA ID</th>
                            <th>Email</th>
                            <th>Username</th>
                            <th>Name</th>
                            <th>Contact</th>
                            <th>Description</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($ras as $ra): ?>
                            <tr>
                                <td><?php echo $ra['ra_id']; ?></td>
                                <td><?php echo $ra['e-mail']; ?></td>
                                <td><?php echo $ra['username']; ?></td>
                                <td><?php echo $ra['name']; ?></td>
                                <td><?php echo $ra['contact']; ?></td>
                                <td><?php echo $ra['description']; ?></td>
                                <!-- Add other fields as needed -->
                                <td><a href="view_ra.php?ra_id=<?php echo $ra['ra_id']; ?>" class="btn btn-primary">View</a></td>                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php else: ?>
            <p>No RA found.</p>
        <?php endif; ?>
    </div>
</body>
</html>
