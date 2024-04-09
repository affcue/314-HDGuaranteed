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
        /* Adjust width as needed */
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
    <div class="adminmenu-container">

        <div class="service-button">
            <button type="submit" name="find_agent">Find Agent</button>
            <button type="submit" name="find_listing">Find Listing</button>
            <button type="submit" name="logout">Logout</button>
        </div>

        <h1>RA View Agent</h1>

        <h2 id="ra-name">RA Name</h2> <!-- <h2> <?php echo "$RAname";?></h2> -->


        <div id="agent-info">
            <p>Name: <span id="agent-name"></span></p>
            <p>Email: <span id="agent-email"></span></p>
            <p>Contact: <span id="agent-contact"></span></p>
        </div>

        <div>
            <p>About Me: <span id="agent-about"></span></p>
        </div>

        <h1>Overall Reviews</h1>

        <div id="overall-reviews">
            <p>Overall Score: <span id="overall-score"></span>/5</p>
            <ul id="reviews-list">
                <!-- add reviews from db  -->
            </ul>
        </div>


</body>

</html>