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

        /* Success message styles */
        .success-message {
            margin-top: 50px;
            text-align: center;
            font-size: 24px;
            color: #007bff;
        }
    </style>
</head>
<body>
    <?php 
    include 'header.php';
    ?>
    <h1 class="title">Edit Profile</h1>
    <div class="success-message">Your profile has been successfully updated!</div>
</body>
</html>
