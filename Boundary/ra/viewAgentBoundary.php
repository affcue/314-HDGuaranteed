<?php
require_once("../../Control/ra/ViewAgentController.php");

$controller = new ViewAgentController();
$agent = $controller->displayAgentInfo($_GET['name']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Agent</title>
    <style>

    </style>
</head>

<body>
    <h1>Agent Details</h1>

    <?php if (isset($agent)) : ?>
        <div id="agent-details">
            <p><strong>Name:</strong> <span id="agent-name"><?php echo htmlspecialchars($agent['name']); ?></span></p>
            <p><strong>Email:</strong> <span id="agent-email"><?php echo htmlspecialchars($agent['e-mail']); ?></span></p>
            <p><strong>Contact:</strong> <span id="agent-contact"><?php echo htmlspecialchars($agent['contact']); ?></span></p>
        </div>
    <?php endif; ?>

</body>

</html>