<?php
// Include the header file
include "header.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Listings</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
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

        .search-bar {
            margin-bottom: 10px;
        }

        .search-bar input[type="text"] {
            padding: 8px;
            width: 60%;
            border-radius: 5px;
            border: 1px solid #ccc;
            font-size: 16px;
            margin-right: 10px;
        }

        .search-bar button {
            padding: 8px 16px;
            border: none;
            background-color: #007bff;
            color: #fff;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            font-weight: 500;
            transition: background-color 0.3s ease;
        }

        .search-bar button:hover {
            background-color: #0056b3;
        }

        .filter-options {
            margin-bottom: 10px;
        }

        .filter-options label {
            margin-right: 10px;
        }

        .filter-options input[type="radio"] {
            margin-right: 5px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        .action-buttons button {
            padding: 8px 16px;
            border: none;
            background-color: #007bff;
            color: #fff;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            font-weight: 500;
            transition: background-color 0.3s ease;
            margin-right: 5px;
            margin-bottom: 5px;
        }

        .action-buttons button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
<div class="container">
    <h2 class="title">Search Listings</h2>
    <div class="search-bar">
        <form method="POST" action="../../Control/ra/search_listing_controller.php">
            <input type="text" name="search" placeholder="Search by location...">
            <button type="submit" name="submit">Search</button>
        </form>
    </div>
    <div class="filter-options">
        <label><input type="radio" name="region" value="north">North</label>
        <label><input type="radio" name="region" value="south">South</label>
        <label><input type="radio" name="region" value="east">East</label>
        <label><input type="radio" name="region" value="west">West</label>
        <label><input type="radio" name="region" value="central">Central</label>
    </div>
    <div class="filter-options">
        <label><input type="radio" name="property_type" value="Condominium">Condominium</label>
        <label><input type="radio" name="property_type" value="HDB Flat">HDB Flat</label>
        <label><input type="radio" name="property_type" value="Landed Property">Landed Property</label>
    </div>
    <!-- You can add more filter options here if needed -->
</div>
</body>
</html>
