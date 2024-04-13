<?php
include("header.php");

class viewListingB {
    public function render() {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Property Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
        }
        .container {
            margin: 20px auto;
            width: 80%;
            text-align: left;
        }
        .title {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 10px;
        }
        .postal-code {
            font-style: italic;
            margin-bottom: 5px;
        }
        .property-type {
            margin-bottom: 5px;
        }
        .price {
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 5px;
        }
        .floor-size {
            margin-bottom: 5px;
        }
        .bedroom {
            margin-bottom: 5px;
        }
        .views {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php include 'viewListingC.php'; ?>
    </div>
</body>
</html>
<?php
    }
}

?>
