<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>User Search</title>
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
<style>
    body {
        display: flex;
        flex-direction: column;
        align-items: center;
        margin: 20px;
        min-height: 100vh;
        background-color: white;
    }

    .header {
        background-color: #bbb;
        color: #333;
        padding: 10px;
        width: 100%;
    }

    .container {
        text-align: center;
        padding: 20px;
        background-color: white;
        width: 80%;
        max-width: 800px;
        margin-top: 20px;
    }

    form {
        margin-top: 20px;
    }

    input[type="text"],
    input[type="submit"],
    input[type="radio"] {
        margin: 5px;
        padding: 8px;
        border-radius: 4px;
        border: 1px solid #ccc;
    }

    input[type="submit"] {
        background-color: #007bff;
        color: white;
        cursor: pointer;
    }
</style>
</head>
<body>
<?php include '../ra/header.php'?>

<div class="container">
    <h2>User Search</h2>
    <form action="../../Control/admin/search_user_controller.php" method="post">
        <input type="text" name="search_term" placeholder="Search users...">
        <br><br>
        <input type="radio" id="admin" name="user_type" value="admin">
        <label for="admin">Admin</label>
        <input type="radio" id="ra" name="user_type" value="ra">
        <label for="ra">RA</label>
        <input type="radio" id="buyer" name="user_type" value="buyer">
        <label for="buyer">Buyer</label>
        <input type="radio" id="seller" name="user_type" value="seller">
        <label for="seller">Seller</label>
        <br><br>
        <input type="submit" value="Search">
    </form>
</div>

</body>
</html>
