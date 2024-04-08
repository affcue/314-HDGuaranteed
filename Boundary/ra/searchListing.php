<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Property Search</title>
    <style>
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
    </style>
</head>
<body>
    <div class="container">
        <div class="input-group">
            <input type="text" placeholder="Search for...">
            <button type="button">Search</button>
        </div>
        <div class="button-group">
            Region
            <button type="button">North</button>
            <button type="button">South</button>
            <button type="button">East</button>
            <button type="button">West</button>
            <button type="button">Central</button>
        </div>
        <div class="button-group">
            Property Type
            <button type="button">Condo</button>
            <button type="button">Landed</button>
            <button type="button">HDB Flat</button>
        </div>
        <div class="listing-info">
            <table border = 1>
                <tr>
                    <th>Listing location</th>
                    <th>Property type</th>
                    <th>Price</th>
                    <th>Floor size</th>
                    <th>No. of rooms</th>
                    <th>Views: yy</th>
                    <th>Currently shortlisted: xx</th>
                    <th><button type="button">View</button></th>
                </tr>
            </table>
        </div>
        <div class="listing-info">
            <table border = 1>
                <tr>
                    <th>Listing location</th>
                    <th>Property type</th>
                    <th>Price</th>
                    <th>Floor size</th>
                    <th>No. of rooms</th>
                    <th>Views: yy</th>
                    <th>Currently shortlisted: xx</th>
                    <th><button type="button">View</button></th>
                </tr>
            </table>
        </div>
        <div class="listing-info">
            <table border = 1>
                <tr>
                    <th>Listing location</th>
                    <th>Property type</th>
                    <th>Price</th>
                    <th>Floor size</th>
                    <th>No. of rooms</th>
                    <th>Views: yy</th>
                    <th>Currently shortlisted: xx</th>
                    <th><button type="button">View</button></th>
                </tr>
            </table>
        </div>
    </div>
</body>
</html>
