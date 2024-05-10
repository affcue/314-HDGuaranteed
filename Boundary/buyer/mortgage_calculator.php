<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mortgage Calculator</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        .container {
            margin-left: 50px; /* Adjust the value as needed */
        }

        .buttons button {
            background-color: #007bff;
            /* Set button background color */
            color: white;
            /* Set button text color */
            padding: 8px 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-family: 'Roboto', sans-serif;
        }

        .form-container {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            margin-left: 100px; /* Adjust the value as needed */
            margin-right: 100px; /* Adjust the value as needed */
        }
    </style>
</head>

<body>
    <div class="form-container">
    <h2>Mortgage Calculator</h2>
        <form action="" method="post" class="container">
            <label for="property_price">Property Price:</label>
            <input type="number" id="property_price" name="property_price" value="<?php echo $listing['price']; ?>"
                required readonly> <br>

            <label for="loan_amount">Loan Amount:</label>
            <input type="number" id="loan_amount" name="loan_amount" required><br>

            <label for="interest_rate">Interest Rate:</label>
            <input type="number" id="interest_rate" name="interest_rate" step="0.01" required><br>

            <label for="loan_tenure">Loan Tenure (in years):</label>
            <input type="number" id="loan_tenure" name="loan_tenure" required><br>

            <div class="buttons">
                <button type="submit">Calculate</button>
            </div>
        </form>
        <br>
        <?php
        require_once '../../Control/buyer/mortgage_controller.php';

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $controller = new MortgageController($conn);
            $result = $controller->calculateMortgage($_POST);
            echo "<p><strong>Monthly Payment:</strong> $" . round($result['monthly_payment'], 2) . "</p>";
            echo "<p><strong>Down Payment:</strong> $" . $result['down_payment'] . "</p>";
        }
        ?>
    </div>
</body>

</html>
