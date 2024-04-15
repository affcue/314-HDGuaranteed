<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RA Search</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 20;
            height: 50vh;
            background-color: white;
        }

        .adminmenu-container {
            text-align: left;
            padding: 20px;
            /* border: 1px solid #ccc; */
            background-color: white;
            width: 80%;
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        input {
            width: 70%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
            box-sizing: border-box;
        }

        .service-button {
            display: flex;
            justify-content: flex-end;
            margin-bottom: 2px;
        }

        .service-button button {
            margin-left: 10px;
            padding: 1px 1px;
            font-size: 13px;
        }

        h1,
        h2 {
            text-align: left;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            border: 1px solid #ccc;

        }

        th,
        td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: left;
        }

        .view-button {
            display: inline-block;
            padding: 8px 12px;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <div class="adminmenu-container">
        <div class="service-button">
            <button type="submit" name="find_agent">Find Agent</button>
            <button type="submit" name="find_listing">Find Listing</button>
            <button type="submit" name="logout">Logout</button>
        </div>
        <h1>RA Search</h1>
        <form method="POST">
            <label for="search_query">Search:</label>
            <input type="text" name="search_query" placeholder="Search for">
            <button type="submit" name="search">Search</button>
            <br><br>
        </form>
        <table>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Contact</th>
                <th>Action</th>
            </tr>
            <?php
            include("../entity/ra/RAEntity.php");

            // Create an instance of RAEntity class
            $raEntity = new RAEntity();

            // Fetch RA data
            $raData = $raEntity->fetchRAData();

            // Display RA data in HTML table
            foreach ($raData as $ra) {
                echo "<tr>";
                echo "<td>{$ra['name']}</td>";
                echo "<td>{$ra['e-mail']}</td>";
                echo "<td>{$ra['contact']}</td>";
                //echo "<td><a href='viewAgentBoundary.php?name=" . urlencode($ra['name']) . "' class='view-button'>View</a></td>";
                //echo "<td><a href='viewAgent.php?id={$ra['id']}'>View</a></td>"; // View button with link to viewAgent.php
                echo "<td><a href='viewAgentBoundary.php?name=" . urlencode($ra['name']) . "' class='view-button'>View</a></td>";
                echo "</tr>";
            }
            ?>
        </table>
        <a href="admin_menu.php"><button>Back</button></a>
    </div>
</body>

</html>