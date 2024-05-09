<?php
// Start the session
session_start();

// Check if the user is logged in, if not redirect to login page
if (!isset($_SESSION['admin_id'])) {
    header("Location: admin_login_boundary.php");
    exit();
}

// Get the ra_id from the session
$ra_id = $_SESSION['admin_id'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>RA Home</title>
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
<style>
    body {
        font-family: 'Roboto', sans-serif;
        background-color: #f2f2f2;
        margin: 0;
        padding: 0;
    }

    .buttons {
        display: flex;
        gap: 10px;
    }

    .container {
        background-color: #fff;
        padding: 20px;
        margin: 20px;
        border-radius: 5px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .title {
        margin-top: 0;
    }

    .button-container {
        display: flex;
        gap: 10px;
    }

    .button-container button {
        padding: 10px 20px;
        border: none;
        background-color: #007bff;
        color: #fff;
        border-radius: 5px;
        cursor: pointer;
        font-size: 16px;
        font-weight: 500;
        transition: background-color 0.3s ease;
    }

    .button-container button:hover {
        background-color: #0056b3;
    }
</style>
</head>
<body>
<?php include '../ra/header.php'?>

<div class="container">
    <h2 class="title">Welcome to your Admin Home</h2>
    <div class="button-container">
        <button onclick="window.location.href='user_search_home.php?admin_id=<?php echo $_SESSION['admin_id']; ?>'">User Search</button>
        <button onclick="window.location.href='../ra/search_listing.php?admin_id=<?php echo $_SESSION['admin_id']; ?>'">Listing Search</button>
        <button onclick="window.location.href='shortlists.php?admin_id=<?php echo $_SESSION['admin_id']; ?>'">My Shortlists</button>
        <button onclick="window.location.href='create_user.php?admin_id=<?php echo $_SESSION['admin_id']; ?>'">Create Account</button>
      
    </div>
</div>

</body>
</html>