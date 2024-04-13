<?php include 'header.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Property Search</title>
    <style>
        /* Your CSS styles here */
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
        }
        .container {
            margin: 20px auto;
            width: 80%;
            text-align: center;
        }
        input[type="text"] {
            padding: 10px;
            width: 60%;
            margin-right: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            font-size: 16px;
        }
        button {
            padding: 10px 20px;
            border: none;
            background-color: #007bff;
            color: #fff;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
        button:hover {
            background-color: #0056b3;
        }
        .button-group {
            margin-top: 10px;
            margin-bottom: 20px;
        }
        .button-group button {
            margin: 0 5px;
        }
        .listing-info {
            padding-bottom: 10px;
            margin-bottom: 20px;
            text-align: left;
        }
        .listing-info th, .listing-info td {
            padding: 8px;
            text-align: left;
        }
        .listing-info button {
            margin-left: 10px;
        }
        table {
            margin: 0 auto; /* Center-align the table */
        }
    </style>
</head>
<body>
<div class="container">
    <div class="input-group">
        <form method="POST" action="">
            <input type="text" name="search" placeholder="Search for...">
            <button type="submit" name="submit">Search</button>
        </form>
    </div>
    <div class="button-group">
        <form method="POST" action="">
            <input type="radio" name="region" value="north">North
            <input type="radio" name="region" value="south">South
            <input type="radio" name="region" value="east">East
            <input type="radio" name="region" value="west">West
            <input type="radio" name="region" value="central">Central
            <input type="radio" name="property_type" value="Condominium">Condominium
            <input type="radio" name="property_type" value="Landed Property">Landed Property
            <input type="radio" name="property_type" value="HDB Flat">HDB Flat
            <button type="submit">Apply Filters</button>
        </form>
    </div>
    <div class="listing-info">
        <?php include 'searchListingC.php'; ?>
    </div>
</div>

