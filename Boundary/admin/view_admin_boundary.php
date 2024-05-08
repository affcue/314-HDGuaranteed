<!DOCTYPE html>
<html>
<head>
    <title>View Admin</title>
</head>
<body>
    <h2>Admin Details</h2>
    <?php
    include '../../Database/db_conn.php';

    if (isset($_GET['id'])) {
        $admin_id = $_GET['id'];

        $sql = "SELECT * FROM admin WHERE admin_id = $admin_id";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            echo "<p><strong>Email:</strong> " . $row['email'] . "</p>";
            echo "<p><strong>Username:</strong> " . $row['username'] . "</p>";
            echo "<p><strong>Name:</strong> " . $row['name'] . "</p>";
            echo "<p><strong>Contact:</strong> " . $row['contact'] . "</p>";
        } else {
            echo "Admin not found";
        }
    } else {
        echo "Invalid request";
    }

    $conn->close();
    ?>
</body>
</html>
