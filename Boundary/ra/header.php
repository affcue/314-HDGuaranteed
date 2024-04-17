<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Header</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
        }
        .header {
            background-color: #bbb;
            color: #333;
            padding: 10px;
            display: flex;
            justify-content: flex-end; /* Align buttons to the right */
            align-items: center;
        }
        .buttons {
            display: flex;
            gap: 10px; /* Add space between buttons */
        }
        .buttons button {
            background-color: #007bff; /* Set button background color */
            color: white; /* Set button text color */
            padding: 8px 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-family: 'Roboto', sans-serif;
        }
    </style>
</head>
<body>
    <div class="header">
        <div class="buttons">
            <button onclick="window.location.href='RASearch.php'">Find Agent</button>
            <button onclick="window.location.href='searchListingB.php'">Find Listing</button>
            <div style="margin-right: 10px;"></div> <!-- Spacer -->
            <button onclick="window.location.href='logout.php'">Logout</button>
        </div>
    </div>
</body>
</html>
