HELLO
<!DOCTYPE html>
<html lang="en">

<head>
    <style>
    body {
        display: flex;
        justify-content: center;
        align-items: center;
        margin: 20;
        height: 30vh;
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
        padding: 6px 12px;
        background-color: #4CAF50;
        color: white;
        border: none;
        border-radius: 3px;
        cursor: pointer;
    }
    </style>
</head>

<body>
<?php include 'header.php'?>
        <h1>RA Search</h1>



        <form method="POST">
            <label for="search_query">Search:</label>
            <input type="text" name="search_query" placeholder="Search for">
            <button type="submit" name="search">Search</button>
            <br></br>
        </form>

        <table>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Contact</th>
                <th>Action</th>
            </tr>
    </div>


</body>

</html>